<div id="user" class="modal fadeIn" tabindex="-1" role="dialog" aria-labelledby="user-preferences" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 id="user-preferences">@you</h3>
    </div>
    <div class="modal-body">
        <div class="row">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
            <li role="presentation"><a href="#account" aria-controls="account" role="tab" data-toggle="tab">Account</a></li>
          </ul>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="profile">Loading...</div>
            <div role="tabpanel" class="tab-pane" id="account">Loading...</div>
          </div>
        </div>
    </div>
{{--     <div class="modal-footer">
        <button class="btn btn-success item-action">Save</button>
    </div> --}}
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <h3 id="myModalLabel"></h3>
    </div>
    <div class="modal-body">
        <input type="hidden" name="id">
        <input type="hidden" name="menu">
        <input type="hidden" name="category">
        <input type="hidden" name="subcategory">
        <input type="hidden" name="position">
        <input type="hidden" name="type">
        <textarea name="content"></textarea>
    </div>

    <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Discard</button>
        <button class="btn btn-info item-action"></button>
    </div>
</div>