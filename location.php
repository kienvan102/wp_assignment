<?php include 'inc/header.php'; ?>
<html>
    <head>
        <title>Location</title>
        <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/locations.js"></script>
        <style type="text/css">
            .map-content {
                height: 800px;
                width: 95%;
            }
            #map {
                width: 100%;
                height: 90%;
                border: 1px solid blue;
            }
            #data, #allData {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                    <form action="" method="POST">
                            <div class="form-group row justify-content-center mb-2 mt-2">
                                <label for="district" class="col-md-2 col-form-label text-center">District</label>
                                <div class="col-12 col-md-6">
                                    <select class="form-control" id="district" name="district">
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                        <option value='6'>6</option>
                                        <option value='7'>7</option>
                                        <option value='8'>8</option>
                                        <option value='9'>9</option>
                                        <option value='10'>10</option>
                                        <option value='11'>11</option>
                                        <option value='12'>12</option>
                                        <option value='binhtan'>Bình Tân</option>
                                        <option value='binhthanh'>Bình Thạnh</option>
                                        <option value='govap'>Gò Vấp</option>
                                        <option value='phunhuan'>Phú Nhuận</option>
                                        <option value='tanbinh'>Tân Bình</option>
                                        <option value='tanphu'>Tân Phú</option>
                                        <option value='thuduc'>Thủ Đức</option>
                                        <option value='binhchanh'>Bình Chánh</option>
                                        <option value='cangio'>Cần Giờ</option>
                                        <option value='cuchi'>Củ Chi</option>
                                        <option value='hocmon'>Hóc Môn</option>
                                        <option value='nhabe'>Nhà Bè</option>
                                    </select>
                                </div>   
                                <button type="submit" name="submit" class="btn btn-secondary col-md-2">Find</button>
                            </div>
                    </form>
            </div>
            <div class="row justify-content-center">
                <div class="map-content text-center">
                    <?php 
                        require 'classes/locations.php';
                        $loc = new locations;
                        $coll = $loc->getLocBlank();
                        $coll = json_encode($coll, true);
                        echo '<div id="data">' . $coll . '</div>';
                        function getAll(){
                            global $loc;
                            $allData = $loc->getAllLocations();
                            $allData = json_encode($allData, true);
                            echo '<div id="allData">' . $allData . '</div>';	
                        }
                                
                        function getDistrict(){
                            global $loc;
                            $type=strval($_POST['district']);
                            $allData = $loc->getLocInDistrict($type);
                            $allData = json_encode($allData, true);
                            echo '<div id="allData">' . $allData . '</div>';
                        }

                        if(isset($_POST['submit'])){
                            getDistrict();
                        }
                        else{
                            getAll();
                        }
                    ?>
                    <div id="map"></div>
                </div>                
            </div>  
        </div>
    </body>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU1jcNBswez41L9krJe_pIpWNd68sJ6Sk&callback=loadMap">
    </script>
</html>

<?php include 'inc/footer.php'; ?>