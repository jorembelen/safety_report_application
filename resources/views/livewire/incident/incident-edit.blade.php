@section('title', 'Edit Notification Report')

<div>

    <div class="row">

        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update('{{ $incidentId }}')">

                        <div class="form-row">


                            <div class="form-group col-md-6">
                                <label for="employee_id">Safety Officer<span class="text-danger"> * </span></label>
                                <div wire:ignore>
                                    <select wire:model="employee_id" class="form-control select2" id="employee">
                                        @foreach( $officers as $officer)
                                        <option value="{{$officer->id}}"  @if (old('employee_id') == $officer->id ) selected="selected" @endif>{{$officer->badge}} - {{$officer->name}} ({{$officer->designation}}) </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('employee_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="location">Site Location<span class="text-danger"> *</span></label>
                                <div wire:ignore>
                                    <select wire:model="location" id="location" class="form-control select2">
                                        @foreach( $locations as $location)
                                        <option value="{{$location->id}}" @if (old('location') == $location->id ) selected="selected" @endif>{{$location->name}} - {{$location->loc_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('location')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="type">Type Of Incident<span class="text-danger"> *</span></label>
                                <select wire:model.defer="type" class="form-control" >
                                    <option value="Fatality" @if (old('type') == 'Fatality') selected="selected" @endif>Fatality</option>
                                    <option value="Lost Time Injury" @if (old('type') == 'Lost Time Injury') selected="selected" @endif>Lost Time Injury</option>
                                    <option value="First Aid" @if (old('type') == 'First Aid') selected="selected" @endif>First Aid</option>
                                    <option value="Property Damage" @if (old('type') == 'Property Damage') selected="selected" @endif>Property Damage</option>
                                    <option value="MTC" @if (old('type') == 'MTC') selected="selected" @endif>MTC</option>
                                    <option value="RWC" @if (old('type') == 'RWC') selected="selected" @endif>RWC</option>
                                    <option value="MVI" @if (old('type') == 'MVI') selected="selected" @endif>MVI</option>
                                    <option value="Dangerous Occurence" @if (old('type') == 'Dangerous Occurence') selected="selected" @endif>Dangerous Occurence</option>
                                    <option value="Near Miss" @if (old('type') == 'Near Miss') selected="selected" @endif>Near Miss</option>
                                </select>
                                @error('type')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="type">Incident Category<span class="text-danger"> *</span></label>
                                <select wire:model.defer="inc_category" class="form-control" >
                                    <option value="Work Related" @if (old('inc_category') == 'Work Related') selected="selected" @endif>Work Related</option>
                                    <option value="Non Work Related" @if (old('inc_category') == 'Non Work Related') selected="selected" @endif>Non Work Related</option>
                                </select>
                                @error('inc_category')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="type">Insurance Type<span class="text-danger"> *</span></label>
                                <select wire:model.defer="insurance" class="form-control" >
                                    <option value="GOSI" @if (old('insurance') == 'GOSI') selected="selected" @endif>GOSI</option>
                                    <option value="Non GOSI" @if (old('insurance') == 'Non GOSI') selected="selected" @endif>Non GOSI</option>
                                </select>
                                @error('insurance')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="sel_involved">Persons Involved<span class="text-danger"> *</span></label>
                                <select wire:model="sel_involved" class="form-control" id="frst_aid" >
                                    <option value="Employee" @if (old('sel_involved') == 'Employee') selected="selected" @endif>Employee</option>
                                    <option value="NonEmployee" @if (old('sel_involved') == 'NonEmployee') selected="selected" @endif>Non Employee</option>
                                </select>
                                @error('sel_involved')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-8" style="{{ $sel_involved == 'Employee' ? null : 'display:none' }}">
                                <label for="employee">Employees Involved Details<span class="text-danger"> </span></label>
                                <div wire:ignore>
                                    <select wire:model="involved" class="form-control select2" id="involved" multiple>
                                        @foreach( $officers as $officer)
                                        <option value="{{$officer->badge}} - {{$officer->name}}" @if (old('employee') == '{{$officer->badge}} - {{$officer->name}}' ) selected="selected" @endif>{{$officer->badge}} - {{$officer->name}} ({{$officer->designation}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('involved')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-8">
                                <div class="form-group" style="{{ $sel_involved == 'NonEmployee' ? null : 'display:none' }}">
                                    <label for="contractor">For Non Employee<span class="text-danger"> </span></label>
                                    <textarea type="text" class="form-control" wire:model.defer="contractor" placeholder="add contractors data here...">{{ old('contractor') }}</textarea>
                                    @error('contractor')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="injury_location">Injury Location (Select one or more if necessary):<span class="text-danger"> *  </span></label>
                                <div wire:ignore>
                                    <select wire:model="injury_location" class="form-control select2" id="injury" multiple>
                                        <option value="Head">Head</option>
                                        <option value="Face">Face</option>
                                        <option value="Neck">Neck</option>
                                        <option value="Back">Back</option>
                                        <option value="Nose/Ears">Nose/Ears</option>
                                        <option value="Chest">Chest</option>
                                        <option value="Leg">Leg</option>
                                        <option value="Abdomen">Abdomen</option>
                                        <option value="Stomach">Stomach</option>
                                        <option value="Shoulder">Shoulder</option>
                                        <option value="Hand">Hand</option>
                                        <option value="Arm">Arm</option>
                                        <option value="Wrist">Wrist</option>
                                        <option value="Elbow">Elbow</option>
                                        <option value="Fingers/Thumb">Fingers/Thumb</option>
                                        <option value="Eyes">Eyes</option>
                                        <option value="Hip">Hip</option>
                                        <option value="Ankle/Foot">Ankle/Foot</option>
                                        <option value="Knee">Knee</option>
                                        <option value="Toes">Toes</option>
                                        <option value="None">None</option>
                                    </select>
                                </div>
                                @error('injury_location')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="injury_sustain">Type of Injury Sustained (Select one or more if necessary):<span class="text-danger"> *</span></label>
                                <div wire:ignore>
                                    <select wire:model="injury_sustain" id="injury_sustain" class="form-control select2" multiple>
                                        <option value="Fracture">Fracture</option>
                                        <option value="Loss of Sight">Loss of Sight</option>
                                        <option value="Dislocation">Dislocation</option>
                                        <option value="Abrasion" @if (old('injury_sustain') == 'Abrasion') selected="selected" @endif>Abrasion</option>
                                        <option value="Cut/Laceration" @if (old('injury_sustain') == 'Cut/Laceration') selected="selected" @endif>Cut/Laceration</option>
                                        <option value="Loss of Consciousness" @if (old('injury_sustain') == 'Loss of Consciousness') selected="selected" @endif>Loss of Consciousness</option>
                                        <option value="Crush Injury" @if (old('injury_sustain') == 'Crush Injury') selected="selected" @endif>Crush Injury</option>
                                        <option value="Suffocation" @if (old('injury_sustain') == 'Suffocation') selected="selected" @endif>Suffocation</option>
                                        <option value="Scalping" @if (old('injury_sustain') == 'Scalping') selected="selected" @endif>Scalping</option>
                                        <option value="Heat" @if (old('injury_sustain') == 'Heat') selected="selected" @endif>Heat</option>
                                        <option value="Cold" @if (old('injury_sustain') == 'Cold') selected="selected" @endif>Cold</option>
                                        <option value="Burn" @if (old('injury_sustain') == 'Burn') selected="selected" @endif>Burn</option>
                                        <option value="Bruising" @if (old('injury_sustain') == 'Bruising') selected="selected" @endif>Bruising</option>
                                        <option value="Amputation" @if (old('injury_sustain') == 'Amputation') selected="selected" @endif>Amputation</option>
                                        <option value="None" @if (old('injury_sustain') == 'None') selected="selected" @endif>None</option>
                                    </select>
                                </div>
                                @error('injury_sustain')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cause">Immediate Cause(s) (Select one or more if necessary):<span class="text-danger"> *</span></label>
                                <div wire:ignore>
                                    <select wire:model="cause" id="cause" class="form-control select2" multiple>
                                        <option value="Safety Rule Violated" @if (old('cause') == 'Safety Rule Violated') selected="selected" @endif>Safety Rule Violated</option>
                                        <option value="Lack of Task Skill" @if (old('cause') == 'Lack of Task Skill') selected="selected" @endif>Lack of Task Skill</option>
                                        <option value="Lack of Supervision" @if (old('cause') == 'Lack of Supervision') selected="selected" @endif>Lack of Supervision</option>
                                        <option value="Improper Lifting (MH)" @if (old('cause') == 'Improper Lifting (MH)') selected="selected" @endif>Improper Lifting (MH)</option>
                                        <option value="Not Paying Attention" @if (old('cause') == 'Not Paying Attention') selected="selected" @endif>Not Paying Attention</option>
                                        <option value="Human Error" @if (old('cause') == 'Human Error') selected="selected" @endif>Human Error</option>
                                        <option value="Inadequate PPE" @if (old('cause') == 'Inadequate PPE') selected="selected" @endif>Inadequate PPE</option>
                                        <option value="Animals" @if (old('cause') == 'Animals') selected="selected" @endif>Animals</option>
                                        <option value="Heat Stress" @if (old('cause') == 'Heat Stress') selected="selected" @endif>Heat Stress</option>
                                        <option value="Hit by Static Machinery" @if (old('cause') == 'Hit by Static Machinery') selected="selected" @endif>Hit by Static Machinery</option>
                                        <option value="Stress" @if (old('cause') == 'Stress') selected="selected" @endif>Stress</option>
                                        <option value="Lack of Resources" @if (old('cause') == 'Lack of Resources') selected="selected" @endif>Lack of Resources</option>
                                        <option value="Method Deviation" @if (old('cause') == 'Method Deviation') selected="selected" @endif>Method Deviation</option>
                                        <option value="Poor Weather Conditions" @if (old('cause') == 'Poor Weather Conditions') selected="selected" @endif>Poor Weather Conditions</option>
                                        <option value="Lack of Task Knowledge" @if (old('cause') == 'Lack of Task Knowledge') selected="selected" @endif>Lack of Task Knowledge</option>
                                        <option value="Lack of Communication" @if (old('cause') == 'Lack of Communication') selected="selected" @endif>Lack of Communication</option>
                                        <option value="Incorrect Tools/Equip" @if (old('cause') == 'Incorrect Tools/Equip') selected="selected" @endif>Incorrect Tools/Equip</option>
                                        <option value="Defective Tools" @if (old('cause') == 'Defective Tools') selected="selected" @endif>Defective Tools</option>
                                        <option value="Violence" @if (old('cause') == 'Violence') selected="selected" @endif>Violence</option>
                                        <option value="STF Above Ground" @if (old('cause') == 'STF Above Ground') selected="selected" @endif>STF Above Ground</option>
                                        <option value="Grinding/Welding" @if (old('cause') == 'Grinding/Welding') selected="selected" @endif>Grinding/Welding</option>
                                        <option value="Heavy Equipment" @if (old('cause') == 'Heavy Equipment') selected="selected" @endif>Heavy Equipment</option>
                                        <option value="Fatigue" @if (old('cause') == 'Fatigue') selected="selected" @endif>Fatigue</option>
                                        <option value="Drugs/Alcohol Related" @if (old('cause') == 'Drugs/Alcohol Related') selected="selected" @endif>Drugs/Alcohol Related</option>
                                        <option value="Poor Housekeeping" @if (old('cause') == 'Poor Housekeeping') selected="selected" @endif>Poor Housekeeping</option>
                                        <option value="Inadequate Lighting" @if (old('cause') == 'Inadequate Lighting') selected="selected" @endif>Inadequate Lighting</option>
                                        <option value="Poor Team Work" @if (old('cause') == 'Poor Team Work') selected="selected" @endif>Poor Team Work</option>
                                        <option value="No Risk Assessment" @if (old('cause') == 'No Risk Assessment') selected="selected" @endif>No Risk Assessment</option>
                                        <option value="Defective Equipment" @if (old('cause') == 'Defective Equipment') selected="selected" @endif>Defective Equipment</option>
                                        <option value="Unprotected Excavation" @if (old('cause') == 'Unprotected Excavation') selected="selected" @endif>Unprotected Excavation</option>
                                        <option value="Horseplay" @if (old('cause') == 'Horseplay') selected="selected" @endif>Horseplay</option>
                                        <option value="STF on the Same Level" @if (old('cause') == 'STF on the Same Level') selected="selected" @endif>STF on the Same Level</option>
                                        <option value="Knives/Sharps" @if (old('cause') == 'Knives/Sharps') selected="selected" @endif>Knives/Sharps</option>
                                        <option value="Splashes from C.P.O.L." @if (old('cause') == 'Splashes from C.P.O.L.') selected="selected" @endif>Splashes from C.P.O.L.</option>
                                        <option value="Vandalism" @if (old('cause') == 'Vandalism') selected="selected" @endif>Vandalism</option>
                                        <option value="Inadequate Visibility" @if (old('cause') == 'Inadequate Visibility') selected="selected" @endif>Inadequate Visibility</option>
                                        <option value="Employee Morale" @if (old('cause') == 'Employee Morale') selected="selected" @endif>Employee Morale</option>
                                        <option value="Employee Attitude" @if (old('cause') == 'Employee Attitude') selected="selected" @endif>Employee Attitude</option>
                                        <option value="Behaviour Problem" @if (old('cause') == 'Behaviour Problem') selected="selected" @endif>Behaviour Problem</option>
                                        <option value="Poor Ground Conditions" @if (old('cause') == 'Poor Ground Conditions') selected="selected" @endif>Poor Ground Conditions</option>
                                        <option value="Improper Lifting (crane)" @if (old('cause') == 'Improper Lifting (crane)') selected="selected" @endif>Improper Lifting (crane)</option>
                                        <option value="Unprotected Edge" @if (old('cause') == 'Unprotected Edge') selected="selected" @endif>Unprotected Edge</option>
                                        <option value="Improper/Poor Slinging" @if (old('cause') == 'Improper/Poor Slinging') selected="selected" @endif>Improper/Poor Slinging</option>
                                        <option value="Manual Handling" @if (old('cause') == 'Manual Handling') selected="selected" @endif>Manual Handling</option>
                                        <option value="Hit by Vehicle" @if (old('cause') == 'Hit by Vehicle') selected="selected" @endif>Hit by Vehicle</option>
                                        <option value="None" @if (old('cause') == 'None') selected="selected" @endif>None</option>
                                    </select>
                                </div>
                                @error('cause')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="equipment">Equipment(s) Involved (Select one or more if necessary)<span class="text-danger"> *</span></label>
                                <div wire:ignore>
                                    <select wire:model="equipment" id="equipment"  class="form-control select2" multiple>
                                        <option value="Light Vehicle" @if (old('equipment') == 'Light Vehicle') selected="selected" @endif>Light Vehicle</option>
                                        <option value="Heavy Vehicle" @if (old('equipment') == 'Heavy Vehicle') selected="selected" @endif>Heavy Vehicle</option>
                                        <option value="Plant Equipment" @if (old('equipment') == 'Plant Equipment') selected="selected" @endif>Plant Equipment</option>
                                        <option value="Static Plant Equipment" @if (old('equipment') == 'Static Plant Equipment') selected="selected" @endif>Static Plant Equipment</option>
                                        <option value="Building" @if (old('equipment') == 'Building') selected="selected" @endif>Building</option>
                                        <option value="Structure" @if (old('equipment') == 'Structure') selected="selected" @endif>Structure</option>
                                        <option value="Scaffold" @if (old('equipment') == 'Scaffold') selected="selected" @endif>Scaffold</option>
                                        <option value="Excavation" @if (old('equipment') == 'Excavation') selected="selected" @endif>Excavation</option>
                                        <option value="None" @if (old('equipment') == 'None') selected="selected" @endif>None</option>
                                    </select>
                                </div>
                                @error('equipment')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="description">Description of the Event<span class="text-danger"> *</span></label>
                                <textarea class="form-control" wire:model.defer="description" id="field-7" placeholder="Write your description here ..." >{{ old('description') }}</textarea>
                                @error('description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="action">Immediate Action(s) Taken to Prevent Reoccurance (If any)<span class="text-danger"> *</span></label>
                                <textarea class="form-control" wire:model.defer="action" placeholder="Write your immediate action here ..." >{{ old('action') }}</textarea>
                                @error('action')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="wps">WPS<span class="text-danger"> *</span></label>
                                <select wire:model.defer="wps" class="form-control" >
                                    <option value="None">None</option>
                                    <option value="1" @if (old('wps') == '1') selected="selected" @endif>1</option>
                                    <option value="2" @if (old('wps') == '2') selected="selected" @endif>2</option>
                                    <option value="3" @if (old('wps') == '3') selected="selected" @endif>3</option>
                                    <option value="4" @if (old('wps') == '4') selected="selected" @endif>4</option>
                                    <option value="5" @if (old('wps') == '5') selected="selected" @endif>5</option>
                                </select>
                                @error('wps')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="wps">Actual Severity<span class="text-danger"> *</span></label>
                                <select wire:model.defer="severity" class="form-control"  >
                                    <option value="None">None</option>
                                    <option value="1" @if (old('severity') == '1') selected="selected" @endif>1</option>
                                    <option value="2" @if (old('severity') == '2') selected="selected" @endif>2</option>
                                    <option value="3" @if (old('severity') == '3') selected="selected" @endif>3</option>
                                    <option value="4" @if (old('severity') == '4') selected="selected" @endif>4</option>
                                    <option value="5" @if (old('severity') == '5') selected="selected" @endif>5</option>
                                </select>
                                @error('severity')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="date">Date and Time of Incident<span class="text-danger"> * </span></label>
                                <div wire:ignore>
                                    <input type="text" value="{{ old('date') }}" id="dateTimeFlatpickr" wire:model.defer="date" class="form-control flatpickr flatpickr-input active" placeholder="Select Date and Time..">
                                </div>
                                @error('date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6" >
                                <div class="form-group custom-file-container" data-upload-id="myFirstImage" wire:ignore>
                                    <label>Incident Images (Attach image) <a href="#" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" class=" form-control" wire:model.defer="images"  multiple>
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                                @error('images.*')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            @if (!$images)
                            @if ($oldImages)
                            <div class="col-md-6">
                                <div class="row mt-4">
                                    @foreach ($oldImages as $photo)
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3 mt-2">
                                        <img src="{{ Storage::disk('s3')->url('files/image/'.$photo ) }}" class="card-img-top" alt="{{ $photo }}" >
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @endif

                            <div class="form-group col-md-12">
                                <label for="docs">Attached Documents (word/pdf)<span class="text-danger"> </span></label>
                                <input type="file" class="form-control-file"  wire:model.defer="docs">
                                @error('docs')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div wire:loading wire:target="update" class="progress-bar progress-bar-striped progress-bar-animated" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Processing . . .</div>
                            <div wire:loading wire:target="images" class="progress-bar progress-bar-striped progress-bar-animated" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Uploading Images . . .</div>
                            <div wire:loading wire:target="docs" class="progress-bar progress-bar-striped progress-bar-animated" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Uploading Documents . . .</div>

                            <div wire:loading.remove wire:target="update, images, docs">
                                <button  class="btn btn-dark waves-effect waves-light" type="submit">Submit</button>
                                <a href="{{ session()->has('previousRoute') ? url(session()->get('previousRoute')) : url()->previous() }}" type="button" class="btn btn-danger waves-effect">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

</div>


@push('edit-notifications-js')
<script src="{{ asset('assets/file-upload/file-upload-with-preview.min.js') }}"></script>
<script src="{{ asset('assets/flatpickr/flatpickr.js') }}"></script>
<script>
    var secondUpload = new FileUploadWithPreview('myFirstImage')
    document.addEventListener('livewire:load', function () {
        $('#injury_location').select2();
    });
</script>
<script>
    var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
</script>
<script>
    $(document).ready(function () {
        window.addEventListener('reApplySelect2', event => {
            $('#employee').select2();
            $('#location').select2();
            $('#involved').select2();
            $('#injury').select2();
            $('#injury_sustain').select2();
            $('#cause').select2();
            $('#equipment').select2();
        });
    });
</script>
<script>
    $('form').submit(function() {
        @this.set('employee_id', $('#employee').val());
        @this.set('location', $('#location').val());
        @this.set('involved', $('#involved').val());
        @this.set('injury_location', $('#injury').val());
        @this.set('injury_sustain', $('#injury_sustain').val());
        @this.set('cause', $('#cause').val());
        @this.set('equipment', $('#equipment').val());
    })
</script>
<script>
    $(document).ready(function() {
        $('#employee').select2();
        $('#location').select2();
        $('#involved').select2();
        $('#injury').select2();
        $('#injury_sustain').select2();
        $('#cause').select2();
        $('#equipment').select2();
    });
</script>

@endpush
