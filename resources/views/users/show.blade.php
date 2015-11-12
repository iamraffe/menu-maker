<div class="row">
 <div class="col-xs-12">
    <div class="panel">
      <div class="panel-heading">
        <button class="btn btn-link btn-sm pull-right" type="button" data-toggle="collapse" data-target="#edit-user-info" aria-expanded="false" aria-controls="edit-user-info">
          Edit
        </button> 
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-3 col-lg-3" align="center">
            @if(isset($user->pictureURL))
              <img alt="User Pic" src="{{ $user->pictureURL }}" class="img-circle img-responsive">
            @else
              <img alt="User Pic" src="https://i0.wp.com/123d.circuits.io/assets/circuits-default-gravatar.png?ssl=1" class="img-circle img-responsive">
            @endif
            
          </div>
          <div class=" col-md-9 col-lg-9"> 
            <table class="table table-user-information">
              <tbody>
                <tr>
                  <td class="row-title">Username</td>
                  <td>{{ '@'.$user->username }}</td>
{{--                   <td>
                    <button data-original-title="Edit info" data-toggle="tooltip" type="button" class="btn btn-sm btn-link" data-toggle="collapse" data-target="#edit-user-info" aria-expanded="false" aria-controls="edit-user-info">
                      <span class="ion ion-ios-compose-outline"></span>
                    </button>
                  </td> --}}
                </tr>
                <tr>
                  <td class="row-title">Name</td>
                  <td>{{ $user->name }}</td>
{{--                   <td>
                    <button data-original-title="Edit info" data-toggle="tooltip" type="button" class="btn btn-sm btn-link" data-toggle="collapse" data-target="#edit-user-info" aria-expanded="false" aria-controls="edit-user-info">
                      <span class="ion ion-ios-compose-outline"></span>
                    </button>
                  </td> --}}
                </tr>
{{--                 <tr>
                  <td>Department</td>
                  <td>Web development</td>
                </tr>
                <tr>
                  <td>Date of Birth</td>
                  <td>02/03/1990</td>
                </tr>
                <tr>
                  <td>Location</td>
                  <td>Madrid, Spain</td>
                </tr> --}}
                <tr>
                  <td class="row-title">Email</td>
                  <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
{{--                   <td>
                    <button data-original-title="Edit info" data-toggle="tooltip" type="button" class="btn btn-sm btn-link" data-toggle="collapse" data-target="#edit-user-info" aria-expanded="false" aria-controls="edit-user-info">
                      <span class="ion ion-ios-compose-outline"></span>
                    </button>
                  </td> --}}
                </tr>
                {{-- <tr>
                  <td>Phone Number</td>
                  <td>913-981-628(Landline)<br><br>655-046-278(Mobile)
                  </td>
                </tr> --}}
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="collapse" id="edit-user-info">
              <div class="well well-lg" style="position: relative;">
                <div class="request-pending hide" style="background-color: rgba(255,255,255,0.75); position: absolute; width: 100%; height: 100%; top: 0; left: 0;">
                  <div class="progress" style="position: relative; z-index: 99999; width: 85%; display:block; margin: 35px auto 0;">
                    <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"style="width: 100%" >
                      <span class="sr-only">Loading</span>
                    </div>
                  </div>
                </div>
                <form id="edit-user" class="form-horizontal" role="form">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" disabled>
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" disabled>
                  </div>
                  <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
 
