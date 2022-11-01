 <!DOCTYPE html>
<html>
<head>
<title>Page Title</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    
    <link href="./main.css" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('app.css') }}" rel="stylesheet">
</head>
<body>

    <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">',$message,'</span>';
            Session::put('message',null);
        }
    ?>
    <div class="header-body">

        <div class="position-center">
            <form role="form" action="{{URL::to('/save-product')}}" method="get" enctype="multipart/form-data">
                {{ csrf_field() }}
                <table class="first-table">
                    <tr>
                        <th><label class="textForm">Tên sản phẩm</label></th>
                        <th><input type="text" name="name_product"  placeholder="Tên sản phẩm">
                    </tr>
                    <tr>
                        <th><label class="textForm">Giá sản phẩm</label></th>
                        <th><input type="text" name="price_product"   placeholder="Giá sản phẩm"></th>
                    </tr>
                    <tr>
                        <th><label    class="textForm">Hình ảnh sản phẩm</label></th>
                        <th><input type="file" name="image_product"  ></th>
                    </tr>
                    <tr>
                        <th><label    class="textForm">Hình ảnh sản phẩm 2</label></th>
                        <th><input type="file" name="image_second_product"  ></th>
                    </tr>
                    <tr>
                        <th><label   class="textForm">Mô tả sản phẩm</label></th>
                        <th><textarea style="resize: none" rows="8"  name="desc_product" placeholder="Mô tả sản phẩm"></textarea></th>
                    </tr>
                    <tr>
                        <th><label   class="textForm">Nội dung sản phẩm</label></th>
                        <th><textarea style="resize: none" rows="8"  name="content_product" placeholder="Nội dung sản phẩm"></textarea></th>
                    </tr>
                    <tr>
                        <th><label    class="textForm">Số lượng sản phẩm</label></th>
                        <th><input type="number" name="quantity_product"  placeholder="Số lượng sản phẩm"></th>
                    </tr>
                    <tr>
                        <th><labels   class="textForm"> Danh mục sản phẩm</label></th>
                        <th><select name="cate_product" class="input-sm m-bot15">
                            <option value="oc">Ốc</option>
                            <option value="vit">Vít</option>
                        </select></th>
                    </tr>
                    <tr>
                        <th><labels  class="textForm">Thương hiệu</label>
                        <th><select name="brand_product" class="input-sm m-bot15">
                            <option value="chau">Châu</option> 
                            <option value="hoang">Hoàng</option> 
                        </select></th>

                    </tr>
                    </tr>
                        <th ><button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button></th>
                    <tr>
                </table>

                
            </form>
        </div>
    </div>
    <table class="second-table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Hình sản phẩm</th>
                <th>Hình sản phẩm thứ 2</th>
                <th>Danh mục sản phẩm</th>
                <th>Thương hiệu sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng</th>
                <th style="width:30px;"></th>
              </tr>
        </thead>
        <tbody>
            @foreach($all_product as $key => $pro)
            <tr>
                <td>{{$pro->name_product}}</td>
                <td><img src="upload/{{$pro->image_product}}" height="100"width="90"></td>
                <td><img src="upload/{{$pro->image_second_product}}" height="100"width="90"></td>
                <td>{{$pro->cate_product}}</td>
                <td>{{$pro->brand_product}}</td>
                <td>{{$pro->price_product}}</td>
                <td>{{$pro->quantity_product}}</td>
                <td>
                    <a class="btn btn-default btn-sm"  href="{{URL::to('/edit-product/'.$pro->id_product)}}">
                        <i class="fa fa-cog"></i>
                    </a>
                <td>   
                    <a onclick="return confirm('Bạn có chắc muốn xóa không @@')" href="{{URL::to('/delete-product/'.$pro->id_product)}}" >
                        <i class="fa fa-cog" aria-hidden="true"></i>
                    </a> 
                </td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html> 