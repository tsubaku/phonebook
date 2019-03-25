<!-- Форма для создания и обновления записей -->
<label for="">Статус</label>
<select class="form-control" name="published">
@if(isset($category->id))
    <!-- Для edit-->
        <option value="0" @if ($category->published == 0) selected="" @endif> Не опубликовано</option>
        <option value="1" @if ($category->published == 1) selected="" @endif> Опубликовано</option>
@else
    <!-- Для create-->
        <option value="0"> Не опубликовано</option>
        <option value="1" selected="selected"> Опубликовано</option>
    @endif




</select>

<!-- Форма для добавления новой категории-->
<label for="">Наименованиеf</label>
<!-- блейд-хелпер: если истина, то вывести содержимое, если нет, то то, что в кавычках -->
<input type="text" class="form-control" name="title" placeholder="Заголовок категории"
       value="{{$category->title ?? ""}}" required>

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация"
       value="{{$category->slug ?? ""}}" readonly>

<label for="">Родительская категория</label>
<select class="form-control" name="parent_id" >
    <option value="0">--no--</option>
    @include('admin.categories.partials.categories', ['categories' => $categories])
</select>

<input class="btn" type="submit" value="сохранить">
