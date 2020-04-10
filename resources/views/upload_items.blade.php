@extends('voyager::master')


@section('content')
	
      <h1><center>Nope</center></h1>
      <br><br>
      <form>
      	<label for="item_id" style="margin-left: 20px;">Item Id</label>
      	<input type="text" id="item_id" name="item_id" style="float: right;"><br><hr>
      	<label for="item_name" style="margin-left: 20px;">Item name</label>
      	<input type="text" id="iname" name="iname" style="float: right;"><br><hr>
      	<label for="item_description" style="margin-left: 20px;">Item short description</label>
      	<input type="text" id="short_description" name="short_description" size="80" style="float: right;"><br><hr>
      	<label for="item_price" style="margin-left: 20px;">Item Price</label>
      	<input type="number" id="price" name="price" size="7" style="float: right;"><br><hr>
      	<label for="category_list" style="margin-left: 20px;">Choose a category</label>
      	<select id="category_list" style="float: right;">
      		<option value="Aap Ki Khidmat Mein">Aap Ki Khidmat Mein</option>
      		<option value="Shuruaat">Shuruaat</option>
      		<option value="Indus Khan">Indus Khan</option>
      	</select>
      	<br><hr>
      	<label for="veg_or_not" style="margin-left: 20px;">Vegetarian / Non-Vegetarian</label>
      	<select id="veg_or_not" style="float: right;">
      		<option value="veg">Vegetarian</option>
      		<option value="nonveg">Non-Vegetarian</option>
      	</select>
      	<br><hr>
      	<label for="img" style="margin-left: 20px;">Select image thumbnail:</label>
  		<input type="file" id="img_thumb" name="img_thumb" accept="image/*" style="float: right;"><br><br><hr>
  		<label for="img" style="margin-left: 20px;">Select image for detail page:</label>
  		<input type="file" id="img_detail" name="img_detail" accept="image/*" style="float: right;"><br><br><hr>
      </form>
    

@endsection