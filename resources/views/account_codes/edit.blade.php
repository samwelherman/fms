@extends('layouts.master')
@section('title'){{trans_choice('general.add',1)}}  {{trans_choice('general.account_codes',1)}}
@endsection
@section('content')
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">{{trans_choice('general.edit',1)}}  {{trans_choice('general.account_codes',1)}}</h6>

            <div class="heading-elements">

            </div>
        </div>
      {!! Form::open(array('url' => url('account_codes/'.$account_codes->id.'/update'), 'method' => 'post', 'class' => 'form-horizontal')) !!}
        <div class="panel-body">
            <div class="form-group">
                {!! Form::label('Account Codes',trans_choice('general.account_codes',1),array('class'=>'col-sm-3 control-label')) !!}
                <div class="col-sm-9">
                    {!! Form::text('account_codes',$account_codes->account_codes, array('class' => 'form-control', 'placeholder'=>"",'required'=>'required')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('Account Name',trans_choice('general.account_name',1),array('class'=>'col-sm-3 control-label')) !!}
                <div class="col-sm-9">
                    {!! Form::text('account_name',$account_codes->account_name, array('class' => 'form-control', 'placeholder'=>"",'required'=>'required')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('Account Group',trans_choice('general.account_group',1),array('class'=>'col-sm-3 control-label')) !!}
                <div class="col-sm-9">
        <select class="form-control "  name="account_group"  required="required">
                                                        <option value="">Select Class</option>                                                     
                                                            @foreach ($group_account as $group)                                                             
                                                                <option value="{{$group->name}}" {{(!empty($account_codes))?($group->name==$account_codes->account_group)?'selected':'':''}}>{{$group->name}}</option>
                                                               @endforeach
                                                    </select>
                </div>
            </div>
          
     <div class="form-group">
                {!! Form::label('Account Status ',trans_choice('general.account_status',1),array('class'=>'col-sm-3 control-label')) !!}
                <div class="col-sm-9">
 <input type="radio" value="Active" name="account_status"  required="required" {{(!empty($account_codes))?($account_codes->account_status=='Active')?'checked':'':''}}> Active  &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp
    <input type="radio" value="Inactive"  required="required" name="account_status" {{(!empty($account_codes))?($account_codes->account_status=='Inactive')?'checked':'':''}} > Inactive 
                </div>
            </div>

              
        </div>
        <!-- /.panel-body -->
        <div class="panel-footer">
            <div class="heading-elements">
                <button type="submit" class="btn btn-primary pull-right">{{trans_choice('general.save',1)}}</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- /.box -->
@endsection

