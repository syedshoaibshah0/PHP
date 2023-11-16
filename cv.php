<?php
$server = "localhost";
$username = "root";
$pass = "";
$database = "uploadimage";
$con = mysqli_connect($server, $username, $pass, $database);

if (!$con) {
    die("Connection failed " . mysqli_connect_error());}

if (isset($_FILES["image"])) {
    $name = $_FILES["image"]["name"];
    $size = $_FILES["image"]["size"];
    $tmpname = $_FILES["image"]["tmp_name"];
    $type = $_FILES["image"]["type"];


    if ($type === 'application/pdf') {
        $upload = move_uploaded_file($tmpname, "upload-images/" . $name);

        if ($upload) {
            $sqlinsert = "insert into info (name, image) values ('$name', 'upload-images/$name')";
            $res = mysqli_query($con, $sqlinsert);

            if ($res) {
                echo "<script>alert('File inserted successfully.');</script>";
            }}

    } else {
        echo "<script>alert('Only PDF files are allowed to be uploaded.');</script>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>CV Upload</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">CV Upload</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <form action="cv.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="card" style="width: 18rem; margin-left: 400px;" >
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNsug8XTE5KVJEMECVvm8p43BZTdvZExoQ9Q&usqp=CAU"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <input type="file" name="image" id="" style="margin-top: 25px; margin-bottom: 25px;">
                    </div>
                </div>

                <div class="card" style="width: 18rem; margin-left: 400px;">
                    <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUVFRgVFRUYGBgaGBgaGBkcHBgYHBgaGBgZGRgZGBgcIS4lHCErIRgYJjgmKy8xNTU1GiQ7QDs0Py40NTEBDAwMEA8QHhISHzQsJSw0NDQ0OjQ0NjQ0NDQ0ND80NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDY0NDQ0NDQ0NDQ0NP/AABEIAJ8BPgMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAAFAAEDBAYCB//EADsQAAIBAgQDBAoBAwMEAwAAAAECAAMRBAUSITFBUSJhcYEGEzJCUpGhscHR8BRi4XKC8SOSotIWQ8L/xAAaAQACAwEBAAAAAAAAAAAAAAAAAwECBAUG/8QAJxEAAwACAgICAQQDAQAAAAAAAAECAxEhMRJBBFFxEzJhoSKB8OH/2gAMAwEAAhEDEQA/APVzBT4SpcsvZUm7Ugbauvb909w27+cLRS6eirWzikoCgAWFuHSdRmYDjBOPztE2XtH6QSbIbSClWqqi7G0BZhnwFwnzmezXOtizvYeP2Ey9bNalY6aK6V5ufwIxSl2Kq99BH0lzIMjKzamYEAceMKejhdaKB76rc+Nr7A+VoKyXIGZgbF2vxP3m+wGShQC5ufhHDzPOS2l2RKbIcOjvsBcdTw+cJYbLkXcgMfDYeAltVAFgLDoJ1KOhykUjq0gwsfn0kkUqAJxFPTdHAZG23FwR0IgSng6mDYvhrvSJu9Ekm3Up/PnNg6gixFxBmIwzJuu69OY/YlkyrkuZZmSV01If9Snip6ES06dJlq+BJb12HbRU4ke6/cw5GE8pztah0VBoqjYqdr969YNe0Sq9MJRSVlvIyLSpc5jR4oFRoopWxWNRBdj5SQLBMw3pDiqaVwqEDUNwOBYcbeUs5rnzNcKdKzCY2qa1ZAm+lgWbkN5eZ1yKqt8I1iODEZDREmIjBY1pzOjOYEiMaPGtABoxjmcwKjGMY8aSSNGk9LCsx2HnCeHwAXe1zEXnmf5Y2MFV/AMo4R24Cw6mX6WWqOO8JrTnQSY7+RddcGqcEz/JSXDgcBadCnLWmILEDzTmUMdmyUxubnoIBzXPXN1Xsj6zHZhnSqdK3d+g337zOqp+zn1k9I0uZ56z3u2lfl8zMpi88LHRRXW3xe6O/vlanga2Ia9QkD4F4ec1mS+jguqWAvy/J6y3QrmmZrBZK9Vg1Ql26e6PKbjKfRYKAX2Hwjj/AImjweASkLKu/Xn/AIlqUdfQ2cf2Q0KCoNKKAP5xMljxpQuKKKCsNUfEa21siK7IoXZm0mxZm4jfkLQSBsKxTilT0gLcm3NiSfMmdwAQjzlluLGUTgSjaqJCfEhuUbvt7rd484ANisFvqTY816+HSCMwwCYldL3R19lxsyEcPHwh3AYvWDewdWIZea2JtcHqN7xsZgw+42br18ZZPXDIaT6AmVZxVoMKOLOrklYDZh/f0P8AD1mpUhh1HIzO1UBBp1VB7jz7wfzKS4qpgrt2qmHG55ug8uI/m0lzvoqm12ax0tIKlQKLk2kWFzelWpipScMpHLiO4jiDMt6Q5uqXLuAPH7dZEzstVJIJZhngGyfOY/Ns8VT2mLOeCjcn9QXXzCrW2pgonxn2j/pEs4HJ1Qa2NurMdz5mMS+hFVvsoFK1c9vsr8A4/wC4wphsGlEXYgdAOJ8uc6fGqo00x/uI+w/fylF3JNybk8zNeP4zfNGa8yXE/wDhaxGOZtl7I+p8T+pVRypupIPURp3Ros50opY9AL/PpNfjETr0ZvKqf8hPDY4Ps2zfQ+HQy1K9D0dqNu5VO72j8ht9YXw+VBFsXZu82E5ue8Mv/FnRw481L/JA8xGE2wigbjw6mRrhedvKZK+TK6Rqn4zfbKAQzr1JhAUZ2Kcy38i664Hzgie+SgmF6yxSwoPKWBRuZbppFO6rtjVMz0jmhh5aVJ0iyQCSkQ2RlJzaTGcEQ0BFackSRhGkEmBxVHE1m7XYU+6N28zCOV+joXci33PnN3hMnRd2Fz05f5hA0VtbSLdLCdR0jnLH9mVoYVUFlE4y3HWx6UidK6GIHxOQbfQGGsbgCvaXcdOYgbM8lTEAMG0VU3RxyPGxtyv8ob2gaaNoyXkJEBZJnTgijiRpqDYNyfob8N+vOaNheLa0NTTIYomW0aBI8DNhalB2ekutHOp6dwCGPFkJ236GGIoJ6KtbB65mD/8AXV1fDob7+z9ZFluKZ6jayyswutMggKqmxNyLE3O9oVnC0lBLBQGNrm25twuZO0GmdxRRSCxWqYQNUSpcgqCNttV+THmO7rLMir4hUF2Npnsxz0m4TYdZKTZV0pJfSjHoiXvupvtyA4yrl+ZB1BuCCNu+8x2fZmGVkU63a4sN7X6whklFkpIpO4G/mb2jEvQny29hfF5RRJLopRjxKErfyG0CPkSF9RUsersWt4A8IVxGYqg7R3tso4n9ecA43Mnqbeyvwjn4nn9o/HgqvwJyZZn8lipWp09ls7f+I8+fgIOr4hnN2N+g5DwEjim+MUx12Y6yVX4FFHjohJAHEkAeJ2EaLCGSZZ69ze4Rd2I534KD3/YTZUMMiLpRQo7vuesfA4VaKKi8uJ+JubH+dJKzzzvyvlPJfD49He+L8dY45XPs5CSOoeQ3nRBPhO9FhM2/o1FdafmY7pLASJli9ElbRGKSyEjBIaDZAqyVVtO9Me0jQbOlncjtaOHliB41oorwAjcTkSUicSpJoYoop0DIKUMTg7HUnmvXwl+KCeiGtgLE4ZKy6XG44Hgynu/UgwWaPhmFPEm6cEqcrdD+uI7xDWKwmrtLs30PjB9VFdTTqLcHYqfuP2JdPZRprkOI6sAQQQRcEbgg8wZG6WmSpPVwB2vUwxO496nfp/LHuM1eCxaVUDowZT/LEcjKNaLTW+PY8edPT6TmBYUUUo43MUQbm56QS2Vb0XHYDcm0D4/OlS4TcwHmedM1yW0r8pksXnTOSlAajzc+yP3GKddi6v6DmbZ2B2nfwHXwHOZqri62I2W6J195vCTYLKC7a3Jd+p4DwEINVSnstnbr7o/cdEVT0kJq1K2yDA5YqDUeyObHif50k9fMjbSgsPiPHyHKUq1VnN2N/sPAcpxN2P40zzXL/ox3nb4ngcm+53jRRTQJFFFNHm2W4T1aHC1GqVDYaBeoWFrksoF1I8vCUrIpaT9/9yWmHSbXoANQYKGKMFb2WKsFb/SxFj5TvBsBUQngHQnwDAmeh+jNVa2DFPEmmQD6rSTYgKQqq4NrPcC1t/ZPGBvTvL1pimadBVQAguoA3OwVgB8ieN/nmXyXVvHS55Q9/H8ZWRP6YbqSOVssxYq0lfmBpcdGXj89j5ya84GSHNuX2ju46VSqXskEcGR651qkbLaJQZyTOC05vKthokBjEzgtOdUhk6JhHEiV50XkEHTmcAzgtHgSdFoytI7xXgBKak51yNjIS0jYaNbFFGvynRMg8r45nCE0wC/IHx3t32vaWIoAQ4TFK66lJ6EEWKkcQw5GNicKHHQjgZBWwTAs9NyrsQxBAKNYAWYWvaw4gyXC12bZ6bIRxuVIv/aQbkd9hJ/lEfwygSVOhx+iJQTCNh2NTDi6Hd04+ajmPqJo69FXFmH+PCBvXaHKMdx9uUsnso0FcuzFKy6kO/McxJa7qu8z2JwR1esotofieSt49/3lPFZ9iQpWphW1D3kIKnv7vnI8foPLXZazTODuq7TH5nniqdIu7ngo3+Z5SHHtiKxN/wDpKeIBu5/UWFytUGo2Uc2PE/vwEbM+kJq/sHf0tSub1TtyprwHiYVTDJSA12vyRePn0jVMaANNMaR8XvHw6SkTNmP4r7oy3nXUk+IxbPt7K/CPyecrxRTZMqVpGWqdPbGijxpICilnLsC1eotJNOpr21Gw2BY3IBPAHgJsFyzC4Cir4qmK1R2IsFDrzIChrKBbmdzfyCcuaYaXbfpDMeKrTfSXsDZJ6KVsQvrNS00N9JYFibbEhRbbjuTLpyvEZa4xC6aqAaXIBHZJBOob6dwO0L2tv3ncww6Y7CBcKwUKQQnsi6gj1bqPZ43HLgeEB+j3pG1Bjh8UGKA6btu1M9Gv7S/blccMn6mTIm+/te9GnwiGl19PfGwlmuVUcwp/1FAgVbWINhqIHsVByPQ/cWlXIfSG18JjRtuup+X9tS/Lo3hfrIM2QYGstbC1F01L3pXuthvwB9nfboeGxtAeeZscVUFRkCkKFsN72JNyefGTjxea12vT9oi8ni9+/a9Mv4ivTwmJYUHFSiygsFIbTcnshr2Yiw36NY77w6lVXUOhup4ETAy1gMwekezup9pTwP6PfI+V8H9SU5f+S/sv8b5v6dapcP8Ao2oePqgOjnNN+eg9G2+R4GXqeIB5zh3Fw9UtHYm4tbl7L+uc6pX9bGLymy5aLzgvIDUkZqQAss84TE72lZqkrOZBOgv6yd+sgZMZbjuJImPRjZXW/S4v8pOmVegnriZpQ9daM2KkE6LT1JEaglRsUDI/XQA9DlPCYHQ71HbW7GwNraUHBFH8vLkU6OzFoUUUUCRRibSrjMelMXYjwmYzHP2e4XYSZlsrVJB7H5wibA3M8/znOHXE02v7baWXqCVAPiJUzDPwDpTtuem48zzkeV4JnqCrV3Ybgcl/4jFKXQmqbNxg8WbWkmIIYcYHr41KQ7R7XJRx8+g8YEx2ZPU2J0r8I4efWPx/Hq+ekLvPMrXbCGNzCmhIQB2+L3R/7faBq1ZnN2JJ+3gOU4inRx4pjowXlquxoooowoKIxSSmoDKH1KupQ9h2gtxqsDzte0hgbPB5PhMZhx6kCnWQANuSQ1vfHvKbbN+iJFl/onSp0zVxraQCRoDWA3sLsN2J4gDqJLisgNNVxWXuzWF9N9Wpeen4uG6nysRaEaOLpZnh2pE6KgsSvEqw4MoPtLvbztsbGct3S5mn475+0dCYl/uS3rj6YPHo1hq668FXKspBHaLAEbi/vKe/6S5gMxXEBsFjVArDbew1kC4ZSODW322I3G1wKvo76L4ihiFqMyBRqDFSxLgggLaw52O/C0FenmJRsSNBBZVAZgfeBJAuOYv9e6Sl+pfgq37T9pkN+EeTWudNemiPFYfEZbXDK11a+k8qijirryYXHzuOYkPpPnaYooy0tDKCGYkEte1l24gb7nrygvF42rVt6yoz6RZdRJtfjb5D5SvNsYeVV/uXtGSsnDU9P0xAR405dwBcmOFncr4jFKg3MpYvMeS/OC1D1GsoLEzPkzKeh0YXXZLjswL7cukmyV8Su6Oyp0O6+QP4hTLvR4L2n7R6cvPr9ppctyN6uyLZRxY7KO7v8BMGR+f7ujbC8P29lHDZ64NnS/ev/qf3DL4qwBZWW+9mUg+fSaXKsho0NwNT83bj/tHu/eXK2EVuIEx1hh9GuclpcmFfM0HFh9TIKme0x8R8FP5msxORI3uiDK/o6vIQXx4+2FZsnpIzVXP/AIUY+JA+15RrZzWbgoX5n7zS1cgtylR8mtyjFhhehNZsjMrWq1H9pmPdfb5DaMiGaR8rI5SI5eRyjFGuhbpvsG0KrrwdvC5t8pcXFOfePzk/9Gekb+l7pPhP0R519sgNVviPzjesb4j8zJKmHI34yGHhP0R519ns8eMTbjBePzhE2XcxKWzW2kEqtVVF2Npm809IgLqnzgTN84JBZ30r4zJYjM3qnTRUgc3P46feMUpdiatvoL5rnQXd2u3IcT8uUCO9bEcewnTmf3LmXZISdRBdubHke680+CyoLu25l/yLW30A8uycItwNIAuzHjbvMkqY/SNNMW/uPE+A5ffwlzOsfZjQUchrP/kAPpArCbPjYppeTMufI5fihib7mKKKbjIKKKKABX0aykYqtoYkKAWYjiQCBpHQkkfWajOMXl+EvQ/p1d7C40qbXG2qo29+8XImPyfM2w1UVVAOxUg7AqbXW/LgDfqBNi3pthTZzQcuBx007jwbVe38tMHyJyPInpufpPXJswuFDW0n9tb4MfgEr0mWutGodJ1AlHK+Ztwtzm0rUKGaUdaWSsotvxU8g1vaU72P+ROcq9Mnr11pLh+yTYkMWKD4m7IAEpemtP8Apq1OvQb1dR9WvTbtW09orwN773FjYc4uqq8ilrVeud/6YyZmIdb2va1r/aOPRSnjKGI9S1J/VknXcHQNvbV/ZvsOHHx4RemumhilqUG01CNbabbNcgMR/cL3HO3fKtT00xbLp1Iv9yr2vqSPpM9VqMzFmYszG5Ykkk9STH48Nu/O9LjWl7/IqssqPGNvnfPr8BLN8/r4mwcqAAQAoIvqtctub8B3QWIoppmJlalGaqdPdMUUjq1lUXJgnF5kTsNhIrJM9lph10X8TjVTvMEYnFs5/E5w+HeqbKD3np4nlNTk3o8FszC56ngPAfmYsmdvhGuMKXYCy7JHqWZ+yv1PgPyZsssycKAqJufMnxh/LcjLWPBfiPP/AEiaTC4RKYsg8TzPiZkqzVMNgbL/AEeUWarv/YOH+4/gQ6qgAAAADgBsB4CdRGLbbGqUujmKPGgAxEjemJLGgBUegJXfCiESIzJJ2GgM+DHSVXwI6Q+ySJqcsqKOTPPge6RNg+6aBqMHZjWNOxCFxvqC7sNrg6eY2POSqIcpAdkTXov2rXsdrju6+UrYnKbm67dZcxKh31VSPUsB6t04K1+LPxVuV+EuUKVRey41i11cWF+5l6942PdJ2U8dl/NswbhewmJzLPhfRTGt+7cDxPOWcxy7EVT/ANWsNPwJz+g/MtZV6Nk7IlhzP7MFwiW22Zunlr1W11mLHkg4D5fibHJ/RZmALAIvLb7CabLckp0gCQGbryHgIUlXX0WnH9gYZGqDsHfoRaU3Qg2IsRymmlfF4RXG+x5GVVfZdz9HnHpPk7q/9SgupA9YBxWwtqt8NgPC0F6TYHkeB5GejDUjaGFvsR3QXj8nUAtTS6Hd6Y5f3J08Pl0mrBneN69GXNgV8rsxZEaW8XhCnaB1IeDdO5uh+8qkTqTStbRzaly9MaKKKSQKPTYBgSAwBBKngwBuQe48I0aQWNr/APN6aJpo4bSbcOyqjwCjf6TKZlmFSu5eq2prWFtgo6KOQlWKKjBEPcrkZearWm+BRo8r4jFKg3PlGtpcsUk30TMbQdi8yC7LuYPxmYM23AdBOMJl71D0HX+cfKZMvyNcSaceH3RE9d3PMmF8syNnIL38Of8Aj7w1lWRhbG3mePkOUPhEpKWOwA3Mx1Trs1TKXRHlGScFVb9w2A8TNhgcpRLFrMenuj9yxlNECgjAW1qrm/HtC4v4A2lqJqtmiZSFFFFKDBRo8aADGMZ1GgVGjR4pIDRjHjQA5IjFZ1FACMpA2GpmiXDozFmYioqly4JuFa24IvbptDs5IkpkNAbDYEG76Cge+umbFWudmZeAa3G3Xe8uLRAAAAAAsBwsOkstAuY5/TpHSO0eduUtyyr1PYVw2Uji/wAv2YSRABYAAdBO4ottsukkNFGeoosCwBJsATa56DrOoFhR40UAI8RQVxZh4HmPCCXptTNm3HJv3DU5qIGBBFwZKeirWzNY/Lg93S2o+0p9l/Hoe/8A5mPx+AKXZQdI9pT7SHv6jv8A+ZvsRQamb7lOvMeMq4vCLVGpTpcDZuR/tbqPtNGHNUPa6M+XDNrns894xjCmY5aUY2WxG7J/+k6ju/4gzjOrFza3JzLioemNGjkRpcgU5dwNyZXxOMVO8wPicWzH8RV5ZkZON0XcVmXJfnBd3c2W5JlzBZU9Tdtl+/gOc1mW5MqjYW+585hvNVGuMakA5ZkFyC256cvM/gTW4HKwLbXNuAH4E0OWZBsC40L094/qaCjRVBpRQB3fk85mdJGiYb7Mfo07Wt+II9JqDtQLIL6WDMB8NiCfK4M9DxeESoLMN+R5iAnw7Ums3A8DyMhVslzoK+jecU8TRVkNiqqrJzRgLWt06GFGTpMM+VNRf1+F7PNkHDv0jp/b8uk02T5ylcW9lxxX8iVc+0XmvTL8UkYX8ZGRaVLiiiigA0Yx4xgVGiiikgNFHjQAU5MeMTABStisUlNdTsAIMzfP0pXC9pvoJhM2zhnJZ38B+hLqfsXVpcIN5z6SO50U7gHbbiZWwXo3VqDXUul+APtHvPTwhf0aywIi1HX/AKji+/FFPBe424/KF3BMRkzPqRuPB5c0aGVsU1TZaYXfi7HZf9o3Y923jLMUuSVMNgVQ6yS7ni7bnwUcFHcJbiigRoUUUUCRRRRQATKDsYIxeEKdpN15jp4d0LxQT0Va2Z6tSSqtm4jdWHFT3H8TKZrlLI3ABjwI2V+8dG7v+Zqs3IpOunbXe47xHDLUXSwuDy/I6R+O6h+SE3E0vFnnTNbjBeOxZGw2noWYZAjb38Dwb/uHHzEzWI9HED7sT3f5myvlKp47Mi+M5rkyVKg9Q2UH+faH8ryICxI1H6D9w/hMoAsLADkB+ZrMuyIKAan/AGj8kfiZKv2zTEN8IB5VkjP7I8WPATV4HLUp7jtN8R5f6Ryl1VAFgAAOAGwjxNU2PmFIpUxeJKEBdLHclLgOVHEoOZHSWoKq5c3aUBW1MWViSrqx7wDe3LcbWEhEvY+ExbDd21oxsjgWKm9tFQcj32HfbmQq0w4KsLgzihhwm/FiAGawBa3AkDa8ng2CXHIErYdqW43TrzHj+5RxeADn1lI6KnHbYMe/oe/5zUEQTjMGUu6cOJXp3j9SyorUnGUZ5qPq63YcbXO1z39D9DDx34zL4nCrWW57LD2WHEdx6juj5ZnL0n9TX3tYBhva/DxH1g530CrXDNIy2nMlB+U4dbSgw5iiigA0aPGgVFGjwRm2cCkLAXMslsG0uwhicUiC7G0x+c+kTNdU7K9eZgfNs3ZrszG0zbVnrkhTpTn1MupSE1brronxuZXOlO258wPGSZJlPrayetOq7C45WG5H0kmFwaoLAeJ5mGckstZDy1fcW/MKT02VlrySNyBvaSaRIlO8mJmA6R//2Q=="
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>



</body>

</html>