<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>studenlist</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/stdsty.css?1">


</head>

<body ng-controller="Ctrl">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-warning" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="../img/ICT_UP_Logo.png" /></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ml-1"></i>
      </button>
      <div class="collapse navbar-collapse " id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.html">หน้าแรก</a></li>
          <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#company">calender</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">About</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li> -->
        </ul>
      </div>
    </div>
  </nav>


  <section>

    <div class="container">
      <div class="row">
        <div class="col-sm">
          <!-- select information -->
          <button class="btn btn-primary" type="button" ng-click="selecttest() ">ดูข้อมูล</button>


          <br><br>

          <table>
            <table class="table table-striped">
              <tr>
                <th>ลำดับ</th>
                <th>รหัสนิสิต</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>สาขา</th>
                <th>ชั้นปี</th>
                <th>หมายเหตุ</th>
              </tr>
              <tr ng-repeat="x in record track by $index">
                <form>
                  <th>{{$index+1}}</th>
                  <td>{{x.Id_students}}</td>
                  <td>{{x.name}}</td>
                  <td>{{x.lastname}}</td>
                  <td>{{x.major}}</td>
                  <td>{{x.year}}</td>
                  <td>
                    <button class=" btn btn-outline-primary" type="button" data-toggle="modal" data-target="#modalCart" ng-click="selectdedit(x.Reg)">MORE</button>
                  </td>
                </form>
              </tr>
            </table>
          </table>
        </div>
      </div>

      <!-- modal data -->
      <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content ">
            <!--Header-->
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Information</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <!-- Modal Body-->
            <div class="modal-body ">

              <?php
              $conn = new mysqli("localhost", "root", "", "itpro");
              $conn->set_charset('utf8');
              ?>
              <!-- ข้อมูลนักศึกษา -->
              <label> 1.ข้อมูลนักศึกษา</label><br><br>
              <div class="form-inline">
                <label for="student_id">รหัสนิสิต:</label>&nbsp;
                <input name="studentid" id="studentid" stype="text" ng-model="Reg.Id_students" class="form-control col-md-2" placeholder="รหัสนิสิต" required>
              </div>
              &nbsp;&nbsp;&nbsp;
              <div class="form-inline">
                <label for="titlename">คำนำหน้า:</label>&nbsp;
                <select name="titlename" id="titlename" class="custom-select col-sm-1" ng-model="Reg.titlename">
                  <option value="นาย">นาย</option>
                  <option value="นางสาว">นางสาว</option>
                </select>&nbsp;&nbsp;
                <label for="name">ชื่อ:</label>&nbsp;
                <input name="name" id="name" type="text" ng-model="Reg.name" class="form-control col-md-3" placeholder="ชื่อ">
                &nbsp;
                <label for="lastname">นามสกุล:</label>&nbsp;
                <input name="lastname" id="lastname" type="text" ng-model="Reg.lastname" class="form-control col-md-3" placeholder="นามสกุล">
              </div>&nbsp;&nbsp;
              </form>
              <form class="form-inline ">
                <div class="form-group">
                  <label for="major">สาขา:</label>&nbsp;
                  <select name="majorselect" class="custom-select col-sm-5 text-nowrap " ng-model="Reg.major" ng-optin=" x for x in major">
                    <option default>----major------</option>
                    <?php
                    $sql = "select  major_name from major ";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                      if ($row['major_name'] == $_GET['majorselect']) {
                        echo "<option selected>";
                      } else {
                        echo "<option>";
                      }

                      echo "{$row['major_name']}</option>";
                    }
                    ?>
                  
                  </select>&nbsp;&nbsp;
                  <label for="year">ชั้นปี:</label>&nbsp;
                  <input name="year" id="year" type="text" ng-model="Reg.year" class="form-control col-3" placeholder="ชั้นปี">
                </div>&nbsp;&nbsp;
              </form>&nbsp;&nbsp;

              <form class="form-group  ">
                <div class=" form-inline">
                  <label for="Address">ที่อยู่: </label>&nbsp;
                  <textarea name="address" id="address" ng-model="Reg.address" class="form-control col-md-4 " rows="3"></textarea>
                </div>&nbsp;&nbsp;&nbsp;
                <div class="form-inline">
                  <label for="Address">จังหวัด: </label>&nbsp;
                  <input ng-model="Reg.provinces" class="form-control col-md-2 "></input>&nbsp;
                  <label for="Address">อำเภอ: </label>&nbsp;
                  <input ng-model="Reg.amphures" class="form-control col-md-2 "></input>&nbsp;
                  <label for="Address">ตำบล: </label>&nbsp;
                  <input ng-model="Reg.district" class="form-control col-md-2 "></input>&nbsp;
                  <label for="Address">รหัสไปรษณีย์: </label>&nbsp;
                  <input ng-model="Reg.zipcode" class="form-control col-md-2 "></input>&nbsp;
                </div>
              </form>

              <form class="form-group">
                <div class="form-inline">
                  <label for="phone">โทรศัพท์มือถือ :</label>&nbsp;&nbsp;
                  <input name="phone" id="phone" type="text" ng-model="Reg.phone" class="form-control " placeholder="เบอร์ติดต่อ" maxlength="10" required>
                  &nbsp;
                  <label for="email">E-mail :</label>&nbsp;&nbsp;
                  <input name="email" id="mail" type="text" ng-model="Reg.mail" class="form-control " placeholder="E-mail" required>
                </div><br>
              </form>
              <br>
              <hr>
              <!-- ข้อมูลสถานประกอบการ -->
              <form class="form-group" method="post">
                <label>2.ข้อมูลสถานประกอบการ </label>
                <form class="form-inline">
                  <div class="form-inline">
                    <label for="personname">เรียน : </label> &nbsp;
                    <input name="person" id="person" type="text" class="form-control col-md-3" ng-model="Reg.contract_person" placeholder="ผู้ติดต่อเพื่อส่งเอกสาร">&nbsp;
                    <label>ตำแหน่ง: </label> &nbsp;
                    <input name="position" id="position" type="text" class="form-control col-md-3" ng-model="Reg.contract_position">&nbsp;<span>(เช่น ผู้จัดการฝ่ายบุคล,หัวหน้างาน)</span>
                  </div>
                </form>

                <form class="form-inline">
                  <div class="form-group">
                    <label>ชื่อสถานประกอบการ : </label> &nbsp;
                    <input name="industry_name" id="industry_name" type="text" class="form-control col-sm-4" ng-model="Reg.comp_name">&nbsp;
                    <label for="Address">ที่อยู่: </label>&nbsp;
                    <textarea name="industry_adress" id="industry_address" class="form-control col-md-4 " rows="3" ng-model="Reg.comp_address"></textarea>
                  </div>&nbsp;&nbsp;&nbsp;
                </form>&nbsp;&nbsp;

                <form class="form-group  ">
                  <div class="form-inline">
                    <label for="provinces">จังหวัด: </label>&nbsp;
                    <input type="text" class="form-control col-md-2" name="industry_provinces" id="industry_provinces" ng-model="Reg.comp_province"></input>&nbsp;
                    <label for="zipcode">รหัสไปรษณีย์: </label>&nbsp;
                    <input type="text" class="form-control col-md-2 " name="industry_zipcode" id="industry_zipcode" ng-model="Reg.comp_zipcode"></input>&nbsp;
                  </div>
                </form>

                <form class="form-inline">
                  <div class="form-group">
                    <label for="phone">โทรศัพท์มือถือ :</label>&nbsp;&nbsp;
                    <input name="person_phone" id="person_phone" type="text" class="form-control " placeholder="เบอร์ติดต่อ" maxlength="10" ng-model="Reg.comp_phone">
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-group">
                    <label for="email">E-mail :</label>&nbsp;&nbsp;
                    <input name="person_email" id="person_email" type="text" class="form-control " placeholder="E-mail" ng-model="Reg.comp_mail">
                  </div><br>&nbsp;
                  <div class="form-group">
                    <label for="FAx">FAX :</label>&nbsp;&nbsp;
                    <input name="FAx" id="FAx" type="text" class="form-control " placeholder="FAX" ng-model="Reg.comp_Fax">
                  </div>
                </form><hr>
              </form>

            </div>
            </form>
            </form>
            </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>


    </div>
  </section>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="./js/stcsrc.js?1"></script>



</body>

</html>