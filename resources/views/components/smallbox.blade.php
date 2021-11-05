<div>
  <div class="col-span-1">
    <div class="bg-white shadow-md py-2 px-2 rounded-lg border-l-4 border-{{$attributes['color']}}-500 flex">
      <div class="pr-2">
        <div class="text-lg capitalize mb-2 text-gray-700">
          <p>{{$slot}}</p>
        </div>
        <div class="text-sm text-{{$attributes['color']}}-700">
          <p class="font-semibold text-3xl">{{$attributes['value']}}</p>
        </div>
      </div>
      <div class="ml-auto">
        <div class="bg-{{$attributes['color']}}-500 p-3 rounded-xl">
          <i class="fa fa-fw {{$attributes['icon']}}  text-white text-xl"></i>
        </div>
      </div>
    </div>
  </div>
</div>