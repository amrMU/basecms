@if(isset($sub_categories ))
@foreach($sub_categories as $sub)
    <option value="{{@$sub->id}}" @if($sub->id == $info->category_id) selected @endif>
        {{@$sub->category_translation->name}} 
    </option>
@endforeach
@endif