<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="jquery-3.1.0.min.js"></script>
    <script src="src/jquery.vpage.min.js"></script>
    <script>
        $(function (){

            // 設定 A 觸發
            $(".my_first_A").vpage({
                name: "page1",
                url: "?onload=page1",
                state: {a:1},
                onload:  function (){
                    alert('onload 1')
                },
                onpop:  function (){
                    alert('pop 1');
                },
                event: 'click', 
                before: function (){
                    alert("click 1")
                }

            });

            // 設定 B 觸發
            $(".my_first_B").vpage({
                name: "page2",
                url: "?onload=page2",
                state: {a:2},
                onload:  function (){
                    alert('onload 2')
                },
                onpop:  function (){
                    alert('pop 2');
                },
                event: 'click', 
                before: function (){
                    alert("click 2")
                }
            });

            // 設定 C 觸發，動態改變 url
            $(".my_first_C").vpage({
                name: "page3",
                state: {a:2},
                onload:  function (){
                    alert('onload 3')
                },
                onpop:  function (){
                    alert('pop 3');
                },
                event: 'click', 
                before: function (data){
                    $.vpage.set("page3", "url", "?onload=page3&else=test");
                    alert("click 3")
                },
                after : function (data){
                    var newurl = $.vpage.get("page3", "url");
                    alert("new_url: " + newurl);
                }
            });

            



            // 監聽事件
            $.vpage.listen();

            // 手動觸發
            // $.vpage.trigger("page2", "onpop");

        })
    </script>
</head>
<body>

    <a class="my_first_A">A</a> <br>
    <a class="my_first_B">B</a> <br>
    <a class="my_first_C">C</a> <br>
    
</body>
</html>