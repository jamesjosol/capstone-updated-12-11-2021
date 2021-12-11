<div class="card mb-3 mt-3" >
    <div class="card-header" id="enrollment-header">
        <h1>Payments</h1>
    </div>
    <div class="card-body">
        <div class="mb-1 mt-1">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="mb-3"><strong>Submit Proof of Payment</strong></h2>
                    <div class="row">
                        <div class="mb-3 form-group @error('payment_channel') has-error @enderror">
                            {!! Form::label('payment_channel','Payment Channel',[],false) !!}
                            {{Form::select('payment_channel', [
                                'Palawan Pawnshop' => 'Palawan Pawnshop',
                                'First Consolidated Bank' => 'First Consolidated Bank',
                            ], $enrollment->payment_channel ?? '', ['class'=>'form-control form-select'])}}
                            <span class="errspan" id="errspan">{{ $errors->first('payment_channel') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 form-group @error('entrance_amount') has-error @enderror">
                            {!! Form::label('entrance_amount', 'Amount Paid',[],false) !!}
                            {!! Form::number('entrance_amount', $enrollment->entrance_amount ?? '', ['class'=>'form-control','required' => '']) !!}
                            <span class="errspan" id="errspan">{{ $errors->first('entrance_amount') }}</span>  
                        </div>
                    </div>
                    @if (!isset($enrollment->payment_image))
                    <div class="uploadPhoto">
                        {{-- <div class="input-group control-group increment mt-2" >
                            <input type="file" name="requiredFile[]" value="" multiple class="form-control" accept="image/png, image/svg, image/jpeg, image/jpg">
                        </div>
                        <span class="errspan errimgfie" id="errspan">{{ $errors->first('requiredFile') }}</span>
                        <span class="errspan errimgfie" id="errspan">{{ $errors->first('requiredFile.*') }}</span> --}}
                        <label for="payment_image">Payment Image</label>
                        <input type="file" name="payment_image" id="fileupload" accept="image/png, image/svg, image/jpeg, image/jpg" class="form-control">
                    </div>
                    @endif
                    @if (isset($enrollment->payment_image))
                        <div class="submitted-docu mt-4">
                            <h5>Payment Submitted:</h5>
                            <div class="img-holder">
                                <img alt="Requirement Image" class="p-1 requirementImages" src='{{url("temp/$enrollment->payment_image")}}'/>
                            </div>
                            <button type="submit" class="btn btn-danger float-end my-2" form="removepaymentimageform"><i class="fas fa-times"></i> Remove Image</button>
                        </div>
                    @endif
                </div>

                <div class="col-md-7">
                    <h4>Available Payment Channel</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <img src="{{asset('img/palawan.png')}}" class="card-img-top" style="height:230px;">
                                <div class="card-body">
                                    <h3 class="card-title"><strong>Palawan Express Padala</strong></h3>
                                    <h5 class="recipient"><strong>Recipient Name:</strong></h5>
                                    <p class="card-name">JOHN ED PAUL NUÑEZ</p>

                                    <h5 class="recipient"><strong>Phone Number:</strong></h5>
                                    <p class="card-name">09324113225</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <img src="{{asset('img/fcb.png')}}" class="card-img-top" style="height:230px;">
                                <div class="card-body">
                                    <h3 class="card-title"><strong>First Consolidated Bank</strong></h3>
                                    <h5 class="recipient"><strong>Recipient Name:</strong></h5>
                                    <p class="card-name">JOHN ED PAUL NUÑEZ</p>

                                    <h5 class="recipient"><strong>Phone Number:</strong></h5>
                                    <p class="card-name">09324113225</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="form-group justify-content-between"> 
            <div class="col-md-2 float-end mt-1">
                <button type="submit" class="btn btn-primary form-control">Review <i class="fad fa-chevron-double-right"></i></button> 
            </div>   
            <div class="col-md-2 float-start mt-1">
                <a href="{{ route('user.enrollment') }}" class="btn btn-danger form-control"><i class="fad fa-chevron-double-left"></i> Back to Enrollment</a>
            </div>
        </div>
        
    </div>
    
</div>
