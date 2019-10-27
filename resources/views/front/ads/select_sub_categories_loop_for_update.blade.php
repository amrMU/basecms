
@foreach($sub_categories as $sub)
    <option value="{{@$sub->id}}" @if($sub->id == $ad->category_id) selected @endif>
        {{@$sub->category_translation->name}} 
    </option>
@endforeach