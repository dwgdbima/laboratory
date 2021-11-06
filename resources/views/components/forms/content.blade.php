<div class="form-group {{$topclass}}">
  @if (!is_null($label))
  <label>{{$label}}</label>
  @endif
  <textarea class="form-control {{$inputclass}} @error($name) is-invalid @enderror" rows="{{$rows}}" id="{{$id}}"
    name="{{$name}}" placeholder="{{$placeholder}}" {{($required) ? 'required' : '' }} {{($disabled) ? 'disabled' : ''
    }}>{{$slot}}</textarea>
  @error($name)
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

@push('scripts')
<script>
  // UniSharp File Manager
     // Define function to open filemanager window
    var lfm = function(options, cb) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
      window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
      window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
      var ui = $.summernote.ui;
      var button = ui.button({
        contents: '<i class="note-icon-picture"></i> ',
        tooltip: 'Insert image with filemanager',
        click: function() {

          lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
            lfmItems.forEach(function (lfmItem) {
              context.invoke('insertImage', lfmItem.url);
            });
          });

        }
      });
      return button.render();
    };
    
    $(()=>{ $('#{{$id}}').summernote({
      dialogsInBody: true,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['insert', ['link', 'video']],
            ['popovers', ['lfm']],
            ['para', ['ul', 'ol', 'paragraph']],
        ],
        buttons: {
            lfm: LFMButton
        }
    });});
</script>
@endpush