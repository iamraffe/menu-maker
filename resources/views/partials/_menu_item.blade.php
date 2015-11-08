  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
      <button class="btn btn-link">
          <span class="fa fa-arrows-v"></span>
      </button>
      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
          <span class="fa fa-times"></span>
      </button>
      {!! $item->relatedText !!}
      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-action="edit" data-type="text" data-toggle="modal">
          <span class="fa fa-pencil"></span>
      </a>
  </p>