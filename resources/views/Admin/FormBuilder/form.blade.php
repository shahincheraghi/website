@extends('Layouts.adminLayout')
@section('title')
    |{{trans('langPanel.footer')}}
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-formBuilder"></div>
                        <div id="formCustom"></div>
{{--                        @foreach($Form as $item)--}}

{{--                        {{$item->data}}--}}
{{--                        @forelse($item->data as $shahin)--}}
{{--                            <li>--}}
{{--                                {{$shahin}}--}}
{{--                            </li>--}}
{{--                            @empty--}}
{{--                            @endforelse--}}

{{--                        @endforeach--}}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('Admin/app-assets/plugins/formBuilder/jquery-ui.min.js')}}"></script>
    <script src="{{asset('Admin/app-assets/plugins/formBuilder/form-builder.min.js')}}"></script>
    <script>

        // Get the form data from the JSON object
        const formData = {!! $Form->data !!};
        // Create the form dynamically
        const form = document.createElement('form');
        form.setAttribute('method', 'post');
        form.setAttribute('action', 'submit.php');
        // Loop through the form data and create the form elements
        for (const field of formData) {
            if (field.type === 'header') {
                // If the field type is header, create an HTML header element
                const header = document.createElement(field.subtype);
                header.innerHTML = field.label;
                form.appendChild(header);
            } else {
                // Otherwise, create an HTML element that corresponds to the type of field
                const label = document.createElement('label');
                label.setAttribute('for', field.name);
                label.innerHTML = field.label + (field.required ? '<span class="required">*</span>' : '');
                let input;
                switch (field.type) {
                    case 'text':
                    case 'email':
                    case 'number':
                    case 'password':
                        // If the field type is a text input, create an HTML input element
                        input = document.createElement('input');
                        input.setAttribute('type', field.type);
                        input.setAttribute('name', field.name);
                        input.setAttribute('id', field.name);
                        input.setAttribute('required', field.required);
                        input.setAttribute('class', field.className);
                        input.setAttribute('value', field.value);
                        break;
                    case 'textarea':
                        // If the field type is a textarea, create an HTML textarea element
                        input = document.createElement('textarea');
                        input.setAttribute('name', field.name);
                        input.setAttribute('id', field.name);
                        input.setAttribute('required', field.required);
                        input.setAttribute('class', field.className);
                        input.innerHTML = field.value;
                        break;
                    case 'hidden':
                        // If the field type is a hidden input, create an HTML input element
                        input = document.createElement('input');
                        input.setAttribute('type', 'hidden');
                        input.setAttribute('name', field.name);
                        input.setAttribute('id', field.name);
                        input.setAttribute('value', field.value);
                        break;
                    case 'file':
                        // If the field type is a file input, create an HTML input element
                        input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('name', field.name);
                        input.setAttribute('id', field.name);
                        input.setAttribute('required', field.required);
                        input.setAttribute('class', field.className);
                        if (field.multiple) {
                            input.setAttribute('multiple', true);
                        }
                        break;
                    case 'select':
                        // If the field type is a select, create an HTML select element
                        input = document.createElement('select');
                        input.setAttribute('name', field.name);
                        input.setAttribute('id', field.name);
                        input.setAttribute('required', field.required);
                        input.setAttribute('class', field.className);
                        if (field.multiple) {
                            input.setAttribute('multiple', true);
                        }
                        for (const option of field.values) {
                            const optionElement = document.createElement('option');
                            optionElement.setAttribute('value', option.value);
                            optionElement.innerHTML = option.label;
                            if (option.selected) {
                                optionElement.setAttribute('selected', true);
                            }
                            input.appendChild(optionElement);
                        }
                        break;
                    case 'radio-group':
                        // If the field type is a radio group, create a set of HTML input radio elements
                        input = document.createElement('div');
                        input.setAttribute('class', field.inline ? 'form-check form-check-inline' : 'form-check');
                        for (const option of field.values) {
                            const radio = document.createElement('input');
                            radio.setAttribute('type', 'radio');
                            radio.setAttribute('name', field.name);
                            radio.setAttribute('id', field.name + '-' + option.value);
                            radio.setAttribute('value', option.value);
                            radio.setAttribute('required', field.required);
                            radio.setAttribute('class', 'form-check-input');
                            if (option.selected) {
                                radio.setAttribute('checked', true);
                            }
                            const radioLabel = document.createElement('label');
                            radioLabel.setAttribute('for', field.name + '-' + option.value);
                            radioLabel.setAttribute('class', 'form-check-label');
                            radioLabel.innerHTML = option.label;
                            input.appendChild(radio);
                            input.appendChild(radioLabel);
                        }
                        break;
                    case 'autocomplete':
                        // If the field type is an autocomplete, create an HTML input element with autocomplete feature
                        input = document.createElement('input');
                        input.setAttribute('type', 'text');
                        input.setAttribute('name', field.name);
                        input.setAttribute('id', field.name);
                        input.setAttribute('required', field.required);
                        input.setAttribute('class', field.className);
                        input.setAttribute('autocomplete', 'on');
                        const datalist = document.createElement('datalist');
                        datalist.setAttribute('id', field.name + '-list');
                        for (const option of field.values) {
                            const datalistOption = document.createElement('option');
                            datalistOption.setAttribute('value', option.value);
                            datalistOption.innerHTML = option.label;
                            datalist.appendChild(datalistOption);
                        }
                        input.appendChild(datalist);
                        break;
                    default:
                        // If the field type is not recognized, skip it
                        continue;
                }
                form.appendChild(label);
                form.appendChild(input);
            }
        }

        // Add the form to the specified div element
        const formDiv = document.getElementById('formCustom');
        formDiv.appendChild(form);
    </script>

@endsection

