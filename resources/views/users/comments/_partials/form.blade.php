@csrf
<textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Escreva aqui...">{{ $comment->body ?? old('body')}}</textarea>
<div class="form-check">
    <input type="checkbox" class="form-check-input" name="visible"
        @if (isset($comment) && $comment->visible)
            checked="checked"
        @endif
    >
    <label for="visible" class="form-check-label">Visível</label>
</div>
<button class="btn btn-primary" type="submit">Enviar</button>
