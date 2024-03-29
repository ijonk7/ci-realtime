<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #ffffff;
            background-image: linear-gradient(to right, #00b4db, #0083b0);
            /* background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160' viewBox='0 0 200 200'%3E%3Cpolygon fill='%23DCEFFA' points='100 0 0 100 100 100 100 200 200 100 200 0'/%3E%3C/svg%3E"); */
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <br>
    <h2 class="text-center"><strong><a href="">Real Time CRUD Codeigniter</a></strong></h2>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background-color: white;">
                <br>
                <button type="button" class="btn btn-dark mb-3" data-toggle="modal" data-target="#ModalAdd">Add
                    Product</button>
                <table id="mytable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="show_product">
                         
                    </tbody>

                </table>
            </div>
        <div class="col-md-12 w3-container w3-black w3-center w3-margin-top">
            <p style="margin-top: 10px">Find me on <a href="https://github.com/ijonk7" target="_blank"
                    style="text-decoration: none;">Github
                    <i class="fa fa-github w3-hover-opacity"></i>. </a>
                Created by <a href="" style="text-decoration: none;">Muhammad Rizal</a></p>
        </div>
        </div>
    </div>
    <!-- Modal Add New Product -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="input1">Product Name</label>
                        <input type="text" name="product_name" class="form-control name" id="input1"
                            placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="input2">Price</label>
                        <input type="text" name="product_price" class="form-control price" id="input2"
                            placeholder="Price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                </div>
            </div>
        </div>
    </div>
     
    <!-- Modal Edit Product -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="input1">Product Name</label>
                        <input type="text" name="product_name" class="form-control name_edit" id="input1"
                            placeholder="Nama Produk">
                    </div>
                    <div class="form-group">
                        <label for="input2">Price</label>
                        <input type="text" name="product_price" class="form-control price_edit" id="input2"
                            placeholder="Harga">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="product_id" class="id_edit">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-edit">Save</button>
                </div>
            </div>
        </div>
    </div>
     
    <!-- Modal Delete Product -->
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        Are you sure you want to delete this data?
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="product_id" class="product_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary btn-delete">Yes</button>
                </div>
            </div>
        </div>
    </div>





    <script>
        $(document).ready(function () {
            // CALL FUNCTION SHOW PRODUCT
            show_product();

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('dee096917714505790fa', {
                cluster: 'ap1',
                forceTLS: true
            });

            var channel = pusher.subscribe('pusher-ci');
            channel.bind('my-event', function (data) {
                if (data.message === 'success') {
                    show_product();
                }
            });

            // FUNCTION SHOW PRODUCT
            function show_product() {
                $.ajax({
                    url: '<?php echo site_url("product/get_product");?>',
                    type: 'GET',
                    async: true,
                    dataType: 'json',
                    success: function (data) {
                        var html = '';
                        var count = 1;
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + count++ + '</td>' +
                                '<td>' + data[i].product_name + '</td>' +
                                '<td>' + data[i].product_price + '</td>' +
                                '<td>' +
                                '<a href="javascript:void(0);" class="btn btn-sm btn-warning item_edit" data-id="' +
                                data[i].product_id + '" data-name="' + data[i].product_name +
                                '" data-price="' + data[i].product_price + '">Edit</a>&nbsp;' +
                                '<a href="javascript:void(0);" class="btn btn-sm btn-danger item_delete" data-id="' +
                                data[i].product_id + '">Delete</a>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('.show_product').html(html);
                    }
                });
            }

            // CREATE NEW PRODUCT
            $('.btn-save').on('click', function () {
                var product_name = $('.name').val();
                var product_price = $('.price').val();
                $.ajax({
                    url: '<?php echo site_url("product/create");?>',
                    method: 'POST',
                    data: {
                        product_name: product_name,
                        product_price: product_price
                    },
                    success: function () {
                        $('#ModalAdd').modal('hide');
                        $('.name').val("");
                        $('.price').val("");
                    }
                });
            });
            // END CREATE PRODUCT

            // UPDATE PRODUCT
            $('#mytable').on('click', '.item_edit', function () {
                var product_id = $(this).data('id');
                var product_name = $(this).data('name');
                var product_price = $(this).data('price');
                $('#ModalEdit').modal('show');
                $('.id_edit').val(product_id);
                $('.name_edit').val(product_name);
                $('.price_edit').val(product_price);
            });

            $('.btn-edit').on('click', function () {
                var product_id = $('.id_edit').val();
                var product_name = $('.name_edit').val();
                var product_price = $('.price_edit').val();
                $.ajax({
                    url: '<?php echo site_url("product/update");?>',
                    method: 'POST',
                    data: {
                        product_id: product_id,
                        product_name: product_name,
                        product_price: product_price
                    },
                    success: function () {
                        $('#ModalEdit').modal('hide');
                        $('.id_edit').val("");
                        $('.name_edit').val("");
                        $('.price_edit').val("");
                    }
                });
            });
            // END EDIT PRODUCT

            // DELETE PRODUCT
            $('#mytable').on('click', '.item_delete', function () {
                var product_id = $(this).data('id');
                $('#ModalDelete').modal('show');
                $('.product_id').val(product_id);
            });

            $('.btn-delete').on('click', function () {
                var product_id = $('.product_id').val();
                $.ajax({
                    url: '<?php echo site_url("product/delete");?>',
                    method: 'POST',
                    data: {
                        product_id: product_id
                    },
                    success: function () {
                        $('#ModalDelete').modal('hide');
                        $('.product_id').val("");
                    }
                });
            });
            // END DELETE PRODUCT

        });
    </script>
</body>

</html>