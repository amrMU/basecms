
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info " data-toggle="modal" data-target="#banned{{@$ad->id}}">
<li class="icon-blocked"></li>
</button>


<!-- Modal -->
<div id="banned{{@$ad->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">@lang('home.banned_list_messages')</h4>
      </div>
      <div class="modal-body">
        <table class="table  table-border">
          @foreach($ad->blocked as $request)
          <tr>
            <th>#</th>
            <th>{{ @$request->id }}</th>
          </tr>
          <tr>
            <th>@lang('home.name')</th>
            <th>{{ @$request->user->fname }}</th>
          </tr>
          <tr>
            <th>@lang('home.phone')</th>
            <th>{{ @$request->user->phone }}</th>
          </tr>
          <tr>
            <th>@lang('home.email')</th>
            <th>{{ @$request->user->email }}</th>
          </tr>
          <tr>
            <th>@lang('home.content')</th>
            <th>{{ @$request->message }}</th>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('home.close')</button>
       

      </div>
    </div>

  </div>
</div>