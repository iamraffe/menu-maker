<p id="{{ $item->getObjectId() }}" class="ui-state-default">
  <button class="btn btn-link">
      <span class="ion ion-ios-shuffle"></span>
  </button>
  <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
      <span class="ion ion-ios-close-outline"></span>
  </button>
  {!! $item->relatedText !!}
  <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-type="text" data-action="edit" data-toggle="modal">
      <span class="ion ion-ios-compose-outline"></span>
  </a>
</p>