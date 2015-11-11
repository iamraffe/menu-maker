<div class="row">
 <div class="col-xs-12">
    <div class="panel">
      <div class="panel-heading">
        <button data-original-title="Edit info" data-toggle="tooltip" type="button" class="btn pull-right btn-link">
          <span class="ion ion-ios-compose-outline"></span>
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
                  <td>Username</td>
                  <td>{{ '@'.$user->username }}</td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td>{{ $user->name }}</td>
                </tr>
                <tr>
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
                </tr>
                <tr>
                  <td>Email</td>
                  <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                </tr>
                  <td>Phone Number</td>
                  <td>913-981-628(Landline)<br><br>655-046-278(Mobile)
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 
