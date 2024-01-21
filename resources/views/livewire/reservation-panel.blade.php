<div>

    <section class="container m-auto mb-20">

        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">

            <h2 class="font-bold px-12 py-12 rounded-xl w-full text-center md:px-32 md:text-5xl sm:text-4xl text-3xl my-8 md:mt-10 mb-0">
                <span class="md:text-2xl sm:text-xl text-xl">Traveling Soon? </span>
                <br>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-[#f59e0b]">
                    Reserve a room!
                </span>
                
            </h2>

        </div>

        @if ($step == 1)

            <div class="flex items-center space-x-2 m-auto text-center justify-start px-5 sm:justify-center sm:px-0 border-b-2 border-gray-300 pb-5">
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-[#f59e0b] font-bold text-xl border-2 border-[#f59e0b]">
                    1
                </div>
                <div class="text-xl font-bold">
                    Pick a building
                </div>
            </div>

            <div class="flex flex-row flex-wrap justify-center"> 

                @foreach ($buldings as $item)    
                    <div class="p-6 max-w-sm bg-white rounded-xl shadow-lg flex md:flex-col md:px-0 md:w-[300px] space-x-4 md:space-x-0 mt-10 mx-5 hover:scale-105 hover:shadow-lg transition-all duration-300 md:pt-0 items-center cursor-pointer" mode="button" wire:click="ChooseBuilding({{ $item->id }})">
                        <div class="h-auto w-[5rem] sm:h-20 sm:w-20 md:w-full md:h-auto shrink-0">
                            <img class="w-full h-auto rounded-md sm:rounded-md sm:w-full" src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}">
                        </div>
                        <div class="md:m-0 md:text-center md:mt-4">
                            <div class="text-xl font-medium text-black">{{ $item->name }}</div>
                            <p class="text-slate-500 md:mt-1">{{ $item->address }}</p>
                        </div>
                    </div>
                @endforeach

            </div>

        @endif


        @if ($step == 2)

            <div class="flex items-center space-x-2 m-auto text-center justify-start px-5 sm:justify-center sm:px-0 border-b-2 border-gray-300 pb-5">
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-[#f59e0b] font-bold text-xl border-2 border-[#f59e0b]">
                    2
                </div>
                <div class="text-xl font-bold">
                    Pick your preferred room
                </div>
            </div>

            <div class="flex flex-row flex-wrap justify-center"> 

                @foreach ($rooms as $item)    
                    <div class="p-6 max-w-sm bg-white rounded-xl shadow-lg flex md:flex-col md:px-0 md:w-[300px] space-x-4 md:space-x-0 mt-10 mx-5 hover:scale-105 hover:shadow-lg transition-all duration-300 md:pt-0 items-center cursor-pointer" mode="button" wire:click="ChooseRoom({{ $item->id }})">
                        <div class="h-auto w-[5rem] sm:h-20 sm:w-20 md:w-full md:h-auto shrink-0">
                            <img class="w-full h-auto rounded-md sm:rounded-md sm:w-full" src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}">
                        </div>
                        <div class="md:m-0 md:text-center md:mt-4">
                            <div class="text-xl font-medium text-black">{{ $item->name }}</div>
                            <p class="text-slate-500 md:mt-1">{{ $item->default_price }}</p>
                        </div>
                    </div>
                @endforeach

            </div>

        @endif


        @if ($step == 3)

            <div class="flex items-center space-x-2 m-auto text-center justify-start px-5 sm:justify-center sm:px-0 border-b-2 border-gray-300 pb-5">
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-[#f59e0b] font-bold text-xl border-2 border-[#f59e0b]">
                    3
                </div>
                <div class="text-xl font-bold">
                    Pick your staying duration plus your additional preferences
                </div>
            </div>

            <div class="my-4 mx-5 mt-6">
                {{ $this->getForms()['dateForm'] }}
            </div>

            <div class="grid grid-cols-3 gap-4 mt-10 mx-5 md:pt-0">

                @foreach ($addons as $item)    
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" wire:click="ChooseAddons({{ $item->id }})">
                        <img class="h-10 w-10 object-contain" src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}">
                        <span class="text-lg">{{ $item->name }}</span>
                    </label>
                @endforeach
            </div>

            <div class="flex justify-center items-center mt-10">
                <button class="bg-[#f59e0b] hover:bg-[#EF6766] text-white font-bold py-2 px-4 rounded-full transition-all duration-300 hover:scale-105 hover:shadow-lg" wire:click="NextStep(4)">
                    Next
                </button>
            </div>


        @endif

        @if ($step == 4)

        

            <div class="flex items-center space-x-2 m-auto text-center justify-start px-5 sm:justify-center sm:px-0 border-b-2 border-gray-300 pb-5">
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-[#f59e0b] font-bold text-xl border-2 border-[#f59e0b]">
                    4
                </div>
                <div class="text-xl font-bold">
                    Summary and Confirmation 
                </div>

            </div>


            <div class="max-w-lg mx-auto p-4 md:p-0 mt-4">
                <div class="bg-white p-6 rounded shadow">
                    <div class="flex justify-between border-b border-gray-200 py-2">
                        <span>{{ $noSeasonsDays[0] }} x <b>{{ $noSeasonsDays[1] }} Days</b></span>
                        <span>${{ $noSeasonsDays[2] }}</span>
                    </div>
                    @foreach ($SeasonDays as $item)
                        @if($item[1] != 0)
                            <div class="flex justify-between border-b border-gray-200 py-2">
                                <span>{{ $item[0] }} x <b>{{ $item[1] }} Days</b></span>
                                <span>${{ $item[2] }}</span>
                            </div>
                        @endif
                    @endforeach
                    <div class="flex justify-between border-b border-gray-200 py-2">
                        <span>Additional Preferences</span>
                        <span>${{ $addOnPrice }}</span>
                    </div>

                    <div class="flex justify-between py-2">
                        <span class="font-bold">Total</span>
                        <span class="text-#f59e0b font-bold">${{ $total_price }}</span>
                    </div>
                </div>
            </div>



            <div class="my-4 mx-5 mt-6">
                {{ $this->getForms()['UserForm'] }}
            </div>


            <div class="flex justify-center items-center mt-10">
                <button class="bg-[#f59e0b] hover:bg-[#EF6766] text-white font-bold py-2 px-4 rounded-full transition-all duration-300 hover:scale-105 hover:shadow-lg" wire:click="CreateReservation()">
                    Finish Reservation
                </button>
            </div>

        @endif


        @if ($step == 5)

            <div class="flex flex-col items-center justify-center my-20">
                <h1 class="text-6xl mb-4 text-green-500">Reserved Successfully</h1>
                <p class="text-xl text-center">
                    Thank you for your reservation. We have sent you the ticket to your email address.
                </p>
            </div>

        @endif


    </section>


</div>
