{{ csrf_field() }}
<input type="hidden" name="client_type" value="{{ $clientType }}">
<div class="form-group">
    {{ Form::label('name', 'Nome')}}
    {{ Form::text('name', old('name', $client->name), ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('document_number', 'Documento')}}
    {{ Form::text('document_number', old('document_number', $client->document_number), ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('email', 'E-mail')}}
    {{ Form::email('email', old('email', $client->email), ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('phone', 'E-Telefone')}}
    {{ Form::text('phone', old('phone', $client->phone), ['class' => 'form-control']) }}
</div>


@if ($clientType == \App\Client::TYPE_INDIVIDUAL)
    @php
        $maritalStatus = old('marital_status', $client->marital_status);
    @endphp
    <div class="form-group">
        {{ Form::label('marital_status', 'Estado Civil')}}
        {{
            Form::select('marital_status', [
                '' => 'Selecione o estado civil',
                '1' => 'Solteiro',
                '2' => 'Casado',
                '3' => 'Divorciado'
            ], old('marital_status', $maritalStatus), ['class' => 'form-control'])
        }}
    </div>

    <div class="form-group">
        {{ Form::label('date_birth', 'Data Nasc.')}}
        {{ Form::date('date_birth', old('date_birth', $client->date_birth), ['class' => 'form-control']) }}
    </div>

    @php
        $sex = old('sex', $client->sex);
    @endphp
    <div class="radio">
        <label>
            {{ Form::radio('sex', 'm', trim($sex) == 'm') }} Masculino
        </label>
    </div>

    <div class="radio">
        <label>
            {{ Form::radio('sex', 'f', trim($sex) == 'f') }} Feminino
        </label>
    </div>

    <div class="form-group">
        {{ Form::label('physical_disability', 'Deficiência Física')}}
        {{ Form::text('physical_disability', old('physical_disability', $client->physical_disability), ['class' => 'form-control']) }}
    </div>

@else
    <div class="form-group">
        {{ Form::label('company_name', 'Nome Fantasia')}}
        {{ Form::text('company_name', old('company_name', $client->company_name), ['class' => 'form-control']) }}
    </div>
@endif

<div class="checkbox">
    <label>
        {{ Form::checkbox('defaulter', 1, old('defaulter', $client->defaulter)) }} Inadimplente?
    </label>
</div>
