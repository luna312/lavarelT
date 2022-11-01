 <!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

   

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">',$message,'</span>';
            Session::put('message',null);
        }
    ?>
    <div class="panel-body">
        <div class="position-center">
            @foreach($edit_product as $key =>$pro_value)
            <form role="form" action="{{URL::to('/update-product/'.$pro_value->id_product)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                <div >
                    <label  >Tên sản phẩm</label>
                    <input type="text" name="name_product"   placeholder="Tên sản phẩm" value="{{$pro_value->name_product}}">
                </div>
                <div >
                    <label  >Giá sản phẩm</label>
                    <input type="text" name="price_product"   placeholder="Giá sản phẩm" value="{{$pro_value->price_product}}">
                </div>
                <div >
                    <label  >Hình ảnh sản phẩm</label>
                    <img src="/upload/{{$pro_value->image_product}}" height="100"width="90">
                
                    <input type="file" name="image_product"   >
                </div>
                <div >
                    <label  >Hình ảnh sản phẩm 2</label>
                    <img src="/upload/{{$pro_value->image_second_product}}" height="100"width="90">
                    <input type="file" name="image_second_product"   >
                </div>

                <div >
                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                    <textarea style="resize: none" rows="8"   name="desc_product" placeholder="Mô tả sản phẩm" >{{$pro_value->desc_product}}</textarea>
                </div>

                <div >
                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                    <textarea style="resize: none" rows="9"   name="content_product" placeholder="Nội dung sản phẩm" >{{$pro_value->content_product}}</textarea>
                </div>
                <div >
                    <label  >Số lượng sản phẩm</label>
                    <input type="number" name="quantity_product"    placeholder="Số lượng sản phẩm" value="{{$pro_value->quantity_product}}">
                </div>

                <div >
                    <labels for="exampleInputPassword1">Danh mục sản phẩm</label>
                    <select name="cate_product" class="form-control input-sm m-bot15" value="{{$pro_value->cate_product}}">
                        <?php
                            if($pro_value->cate_product=='oc'){
                        ?>
                                <option value="oc" selected>Ốc</option>
                                <option value="vit">Vít</option>
                        <?php
                            }else{
                        ?>
                                <option value="oc" >Ốc</option>
                                <option value="vit" selected>Vít</option>
                        <?php
                            }
                        ?>
                        
                        
                    </select>
                </div>
                <div >
                    <labels for="exampleInputPassword1">Thương hiệu</label>
                    <select name="brand_product" class="input-sm m-bot15" value="{{$pro_value->brand_product}}">
                        <?php
                            if($pro_value->cate_product=='chau'){
                        ?>
                        <option value="chau" selected>Châu</option> 
                        <option value="hoang">Hoàng</option>
                        <?php
                            }else{
                        ?> 
                        <option value="chau">Châu</option> 
                        <option value="hoang" selected>Hoàng</option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" name="edit_product" class="btn btn-info">Lưu sản phẩm</button>
            </form>
            @endforeach
        </div>
    </div>
     </body>
</html> 