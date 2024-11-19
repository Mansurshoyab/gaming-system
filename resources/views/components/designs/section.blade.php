@props(['class' => 'col-sm-12'])

<section class="row" >
  <div @class([$class]) >
    {{ $slot }}
  </div>
</section>
