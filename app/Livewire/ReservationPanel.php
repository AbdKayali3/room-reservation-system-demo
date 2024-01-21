<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Reservations;
use App\Models\ReservationsAddons;
use App\Models\Rooms;
use App\Models\Buildings;
use App\Models\Addons;
use App\Models\Seasons;
use App\Models\SeasonsRooms;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Columns;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;

use Carbon\Carbon;



class ReservationPanel extends Component implements HasForms
{

    use InteractsWithForms;

    public $step = 1;
    public $buldings;
    public $rooms;
    public $addons;

    public $building_id;
    public $room_id;
    public $selectedAddons= [];

    public $start_date;
    public $end_date;

    public $name;
    public $email;
    public $phone;

    public $duration;
    public $duration_price;
    public $total_price;

    public $dateForm;
    public $UserForm;

    public $addOnPrice;

    public $noSeasonsDays = [];

    public $SeasonDays = [];
    public $addOnPricesArray = [];

    public function mount()
    {

        $this->start_date = date('Y-m-d');
        $this->end_date = date('Y-m-d');

        $this->duration = 1;
        
        $this->selectedAddons = [];

        // loop through seasons and put them as a key in the array
        $seasons = Seasons::orderBy('created_at', 'asc')->get();
        foreach ($seasons as $season) {
            $this->SeasonDays[$season->id] = [
                $season->name,
                0,
                0,
            ];
        }

        $this->noSeasonsDays = [
            'Normal Days',
            0,
            0,
        ];
    
    }

    public function render()
    {

        $this->buldings = Buildings::orderBy('created_at', 'asc')->get();
        $this->rooms = Rooms::where('building_id', $this->building_id)->get();
        $this->addons = Addons::orderBy('created_at', 'asc')->get();

        return view('livewire.reservation-panel');
    }

    Public function getForms(): array
    {

        return [
            'dateForm' => $this->dateForm(new \Filament\Forms\Form($this)),
            'UserForm' => $this->UserForm(new \Filament\Forms\Form($this)),
        ];
    }


    Public function dateForm(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
            ])
            ->columns(2);
    }
    
    public function UserForm(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->afterStateUpdated(function (HasForms $livewire, TextInput $component) {
                        $livewire->validateOnly($component->getStatePath());
                    }),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->afterStateUpdated(function (HasForms $livewire, TextInput $component) {
                        $livewire->validateOnly($component->getStatePath());
                    }),
                TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->afterStateUpdated(function (HasForms $livewire, TextInput $component) {
                        $livewire->validateOnly($component->getStatePath());
                    }),
            ]);
    }


    public function changeStep($s)
    {
        $this->step = $s;
    }

    public function ChooseBuilding($id)
    {
        $this->building_id = $id;
        $this->changeStep(2);
    }

    public function ChooseRoom($id)
    {
        $this->room_id = $id;
        $this->changeStep(3);
    }

    public function ChooseAddons($id)
    {
        if (in_array($id, $this->selectedAddons)) {
            unset($this->selectedAddons[array_search($id, $this->selectedAddons)]);
        } else {
            $this->selectedAddons[] = $id;
        }

    }

    public function NextStep($s) {
        $this->changeStep($s);

        if ($s == 4) {
            $this->CalculatePrice();
        }
    }

    public function CalculatePrice()
    {
        
        $this->duration_price = 0;
        $this->total_price = 0;

        $this->duration = (strtotime($this->end_date) - strtotime($this->start_date)) / 86400;

        $inSeasonDays = 0;

        // get the price of the room and the days included in each season
        $seasons_room = SeasonsRooms::where('room_id', $this->room_id)->get();
        foreach ($seasons_room as $season_room) {

            $season = $season_room->Season;
             
            $start_season = Carbon::parse($season->start_date);
            $end_season = Carbon::parse($season->end_date);

            $start = Carbon::parse($this->start_date);
            $end = Carbon::parse($this->end_date);

            $start_date_in_season = $start->max($start_season);
            $end_date_in_season = $end->min($end_season);

            $days = $start_date_in_season->diffInDays($end_date_in_season);

            $this->duration_price += $season_room->price * $days;

            $this->SeasonDays[$season->id][1] = $days;
            $this->SeasonDays[$season->id][2] = $season_room->price * $days;
            $season_room = $season_room->first();
            $inSeasonDays += $days;
        }

        // calculate the normal days by subtracting the days in season from the total days
        $days = $this->duration - $inSeasonDays;

        $room_price = Rooms::find($this->room_id)->default_price;

        $this->noSeasonsDays[1] = $days;
        $this->noSeasonsDays[2] = $room_price * $days;
        $this->duration_price += $room_price * $days;

        // calculate the addons price
        $this->addOnPrice = 0;
        foreach ($this->selectedAddons as $addon) {
            $APrice = Addons::find($addon)->price;
            $this->addOnPrice = $APrice * $this->duration;
            $this->addOnPricesArray[] = [
                $addon,
                $APrice * $this->duration,
            ];
        }

        // and finally the total price
        $this->total_price = $this->duration_price + $this->addOnPrice;
    }

    public function CreateReservation()
    {

        // validate the data
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        $reservation = Reservations::create([
            'building_id' => $this->building_id,
            'room_id' => $this->room_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'duration' => $this->duration,
            'duration_price' => $this->duration_price,
            'total_price' => $this->total_price,
        ]);

        foreach ($this->addOnPricesArray as $addon) {
            ReservationsAddons::create([
                'reservation_id' => $reservation->id,
                'addon_id' => $addon[0],
                'price' => $addon[1],
            ]);
        }

        $this->changeStep(5);
    }
}
