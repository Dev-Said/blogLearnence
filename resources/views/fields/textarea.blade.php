<div>
   {!! Form::label($name, $label, ['class' => 'block text-sm font-medium text-gray-700']) !!}
    <div class="mt-1{{ $errors->has($name) ? " relative rounded-md shadow-sm" : "" }}">
        {!! Form::textarea($name, isset($default) ? $default : null, [
            'class' =>'block text-sm font-medium text-gray-700 max-w-full border border-gray-300 rounded-lg', 'maxlength' => "5000" . 
                (
                    $errors->has($name) ? 
                        " border-red-300 pr-10 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500" : 
                        " appearance-none border-gray-300 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                ),
            'placeholder' => isset($placeholder) ? $placeholder : '',
            'autocomplete'=> $name,
        ]) !!}


        @if($errors->has($name))
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
        </div>
        @endif
    </div>

    @if($errors->has($name))
        <p class="mt-2 text-sm text-red-600" id="{{ $name }}-error">{{ $errors->get($name)[0] }}</p>
    @else
        <p class="mt-2 text-sm text-gray-500" id="email-description">{{ isset($legend) ? $legend : ''}}</p>
    @endif
</div>
