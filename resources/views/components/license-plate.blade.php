<a href="{{ route('cars.show', $carId) }}"
   class="border-4 border-black rounded-md flex font-bold text-lg text-black w-fit
                                @if (!$loopLast)
                                    mb-0.5
                                @endif
                                @if ($isOnParking)
                                    bg-green-400
                                @else
                                    bg-white
                                @endif">
    <div class="flex mt-0.5 mx-1 ">
        <span class="tabular-nums text-base leading-7 ">
            {{ preg_split('//u', $licensePlate, -1, PREG_SPLIT_NO_EMPTY)[0] }}
        </span>
        <span class="tabular-nums ">
            {{ preg_split('//u', $licensePlate, -1, PREG_SPLIT_NO_EMPTY)[1] }}{{ preg_split('//u', $licensePlate, -1, PREG_SPLIT_NO_EMPTY)[2] }}{{ preg_split('//u', $licensePlate, -1, PREG_SPLIT_NO_EMPTY)[3] }}
        </span>
        <span class="tabular-nums text-base leading-7 ">
            {{ preg_split('//u', $licensePlate, -1, PREG_SPLIT_NO_EMPTY)[4] }}{{ preg_split('//u', $licensePlate, -1, PREG_SPLIT_NO_EMPTY)[5] }}
        </span>
    </div>
    <div class="w-[2px] bg-black"></div>
    <div class="flex flex-col mx-1">
        <div class="w-fit h-min mb-1">
            <span class="tabular-nums mb text-sm">
                {{ preg_split('//u', $licensePlate, -1, PREG_SPLIT_NO_EMPTY)[6] }}{{ preg_split('//u', $licensePlate, -1, PREG_SPLIT_NO_EMPTY)[7] }}@isset(preg_split('//u', $licensePlate, -1, PREG_SPLIT_NO_EMPTY)[8]){{ preg_split('//u', $licensePlate, -1, PREG_SPLIT_NO_EMPTY)[8] }}@endisset
            </span>
        </div>
        <div class="text-[8px] font-medium -mt-5 -mb-2 select-none ">
            <span>RUS</span>
        </div>
    </div>
</a>
