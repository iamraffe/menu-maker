<div id="user" class="modal fadeIn" tabindex="-1" role="dialog" aria-labelledby="user-preferences" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 id="user-preferences">Account &amp; Profile</h3>
    </div>
    <div class="modal-body">
        <div class="row">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
          </ul>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="profile">
              <h4 class="animated pulse infinite text-center">Loading...</h4>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings">
              <div class="collapse-section">
                <div class="row">
                  <div class="col-sm-6">
                    <h4>Password</h4>
                  </div>
                  <div class="col-sm-6">
                    <button class="btn btn-warning pull-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      Change
                    </button> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="collapse" id="collapseExample">
                      <div class="well well-lg" style="position: relative;">
                        <div class="request-pending hide" style="background-color: rgba(255,255,255,0.75); position: absolute; width: 100%; height: 100%; top: 0; left: 0;">
                          <div class="progress" style="position: relative; z-index: 99999; width: 85%; display:block; margin: 35px auto 0;">
                            <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"style="width: 100%" >
                              <span class="sr-only">Loading</span>
                            </div>
                          </div>
                        </div>
                        <form id="change-password" class="form-horizontal" role="form">
                          <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Repeat New Password</label>
                            <input type="password" name="confirmation_password" class="form-control">
                          </div>
                          <button type="submit" class="btn btn-success">Save Password</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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