<a href="<?php echo URLROOT;?>/admin/dashboard">Run it back!</a>
   
    <h1>API TESTING GOD SSEJ ARGUX BUBU</h1>
    <br>
    <h3>A new era of programming, the era of the establisment of REST API</h3>

    <button id="api-news">API NEWS</button>
    <button id="api-events">API EVENTS</button>


  <script>
        const apiNews = document.getElementById('api-news');
        const apiEvents = document.getElementById('api-events');

        apiNews.addEventListener('click', function(){
            fetch('<?php echo URLROOT;?>/api/posts/read').then(res => res.json()).then(data => console.log(data))
        })

        apiEvents.addEventListener('click', function(){
            fetch('<?php echo URLROOT;?>/api/events/read').then(res => res.json()).then(data => console.log(data))
        })
 </script>