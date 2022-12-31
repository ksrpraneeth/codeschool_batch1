<h1>Ratings:</h1>
<div class="star-rating">
  <input type="radio" id="5-stars" name="rating" value="5" />
  <label for="5-stars" class="star">&#9733;</label>
  <input type="radio" id="4-stars" name="rating" value="4" />
  <label for="4-stars" class="star">&#9733;</label>
  <input type="radio" id="3-stars" name="rating" value="3" />
  <label for="3-stars" class="star">&#9733;</label>
  <input type="radio" id="2-stars" name="rating" value="2" />
  <label for="2-stars" class="star">&#9733;</label>
  <input type="radio" id="1-star" name="rating" value="1" />
  <label for="1-star" class="star">&#9733;</label>
</div>
<style>
 {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 50vh;
 
}
.star-rating {
  color: gold;
  display: inline-block;
  font-size: 2em;
  position: relative;
  transform: translate(6px);
}

.star-rating__max,
.star-rating__current {
  position: absolute;
  top: 10;
}

.star-rating__current {
  overflow: hidden;
  white-space: nowrap;
}
</style>
<head>
  <br><br>
<h1 class="heading">Add Comments:</h1>
<body>
  <div class="container">
    <form>
      <div class="form-group">
        <textarea class="form-control status-box" rows="3" placeholder="Enter your comment here..."></textarea>
      </div>
    </form>
    <div>
        <h2>Buy Again!!!</h2>
        <h5>See what others are reoredring on Buy Again</h5>
  </div>
</body>
<style>
  heading {
    color: #666666;
    text-align: center;
}
body {
  font-family: Arial, sans-serif;
  color: #4.04040;
  background-color: #eee;
}
.container {
  width: 520px;
  margin-top: 20px;
}
.button-group {
  margin-bottom: 20px;
}
.counter {
  display: inline;
  margin-top: 0;
  margin-bottom: 0;
  margin-right: 10px;
}
.posts {
  clear: both;
  list-style: none;
  padding-left: 0;
  width: 100%;
  text-align: left;
}
.posts li {
  background-color: #fff;
  border: 1.5px solid #d8d8d8;
  border-radius: 10px;
  padding-top: 10px;
  padding-left: 20px;
  padding-right: 20px;
  padding-bottom: 10px;
  margin-bottom: 10px;
  word-wrap: break-word;
  min-height: 42px;
  box-shadow:8px 8px 5px #888888;
}
.btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}
</style>
<li class="dropdown nav-item">
        <a class="nav-link "href="home.php">
        <i class="nav-link-icon fa fa-edit">Visit Buy Again</i>
        </a>
    </li>