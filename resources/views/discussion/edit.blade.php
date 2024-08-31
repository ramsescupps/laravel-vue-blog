@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="dicussion row">
            <div class="col-md-9 offset-md-1">
                <form class="form" action="{{ url('discussion', ['id' => $discussion->id]) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">{{ lang('Discuss Title') }}</label>
                        <div class="col-sm-10">
                            <input type="text" id="title" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $discussion->title }}">

                            @if ($errors->has('title'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ lang('Discuss Tag') }}</label>
                        <div class="col-sm-10">
                            <select class="select{{ $errors->has('tags') ? ' is-invalid' : '' }}" multiple="multiple" name="tags[]" style="width: 100%">
                                @foreach($tags as $tag)
                                    @if(in_array($tag->id, $selectTags))
                                        <option value="{{ $tag->id }}" selected>{{ $tag->tag }}</option>
                                    @else
                                        <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @if ($errors->has('tags'))
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('tags') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-2 col-form-label">{{ lang('Discuss Content') }}</label>
                        <div class="col-sm-10">
                            <parse-textarea class="{{ $errors->has('content') ? ' is-invalid' : '' }}" content="{{ json_decode($discussion->content)->raw }}"></parse-textarea>

                            @if ($errors->has('content'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success float-right" onClick="this.form.submit(); this.disabled=true;">{{ lang('Edit Discussion') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $('.select').select2();
</script>
@endsection

@section('styles')
<style>
    .dicussion {
        margin-top: 40px;
    }
</style>
@endsection
