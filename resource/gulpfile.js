/////////////////////////
/////プラグイン読み込み//////
/////////////////////////

const gulp = require("gulp");
const brwsync = require("browser-sync");//ブラウザチェックツール
const sass = require("gulp-sass");//scssコンパイル
const sassGlob = require('gulp-sass-glob');//scssでワイルドカードの使用を許す
const autoprefixer =require('gulp-autoprefixer');//ベンダープレフィックスを自動で生成
const sourcemaps =require('gulp-sourcemaps');//デベロッパーツールにてSCSSのエラー行数を確認できるようにする。
const concat = require('gulp-concat');//ファイルを連結
const imagemin =require('gulp-imagemin');//画像を圧縮
const pngquant =require('imagemin-pngquant');//画像を圧縮
const rename =require('gulp-rename');//画像を圧縮
const del =require('del');//ファイルを消す
const plumber = require('gulp-plumber');//エラーを吐き出す
const notify = require("gulp-notify");//エラー通知
const runSequence = require('run-sequence');//同期非同期をする。
const uglify = require("gulp-uglify");//JSソースの圧縮
const cleanCSS    = require('gulp-clean-css');//CSS圧縮

//////////////////
//////変数指定//////
//////////////////
const BASE_PATH = "../cms";
const THEME_BASE_PATH = BASE_PATH + "/wp-content/themes/wadason/";

const SOURCE_ROOT = "./src";
const SOURCE_SCSS = SOURCE_ROOT + "/scss/style.scss";
const SOURCE_JS = SOURCE_ROOT + "/js";
const SOURCE_IMG = SOURCE_ROOT +"/images/*";

const DEST_ROOT = THEME_BASE_PATH + "/dist";
const DEST_SCSS = DEST_ROOT + "/stylesheets";
const DEST_JS = DEST_ROOT + "/javascripts";
const DEST_IMG = DEST_ROOT +"/images";

const WATCH_SCSS = "./src/scss/**/*";
const WATCH_JS = "./src/js/**/*";
const WATCH_IMG = "./src/images/**";

var onError = function (err) {
  console.log("An error occurred:", gutil.colors.magenta(err.message));
  this.emit("end");
};

var proxy_Name = "wadason.test";
var base_Dir_theme = BASE_PATH +"/wp-content/**";

///////////////
//////sass/////
///////////////

gulp.task("sass",function(){
  gulp.src(SOURCE_SCSS)
  .pipe(plumber({ errorHandler:
    notify.onError({
      title: "SCSSのエラーです", // 任意のタイトルを表示させる
      message: "<%= error.message %>" // エラー内容を表示させる
    })
  }))
  .pipe(sassGlob())
  .pipe(sourcemaps.init())    //ソースマップを作ります
  .pipe(sass({
    outputStyle: 'compressed',// nested, compact, compressed, expanded sourcemaps使うときはこれ
    sourcemap: true
  }))
  .pipe(autoprefixer())
  .pipe(cleanCSS())
  .pipe(sourcemaps.write("./maps"))
  .pipe(gulp.dest(DEST_SCSS));
});


//////js/////
gulp.task("js",function(){
  gulp.src([SOURCE_JS+"/lib/jquery-2.2.4.js",SOURCE_JS+"/lib/*.js",SOURCE_JS+"/app/*.js",SOURCE_JS+"/*.js"])
  .pipe(plumber())
  .pipe(uglify())
  .pipe(concat("script.min.js"))
  .pipe(gulp.dest(DEST_JS));
});

//////img/////
gulp.task('imagesmin', function() {
  gulp.src(SOURCE_IMG)
    .pipe(plumber({errorHandler: onError}))
    .pipe(imagemin({optimizationLevel: 7, progressive: true}))
    .pipe(gulp.dest(DEST_IMG));
});


//////リリースファイルをまとめる--バックアップも一括で/////
gulp.task("wrap",function(){
  var today = new Date();
  var to_year=today.getFullYear();
  var to_month=today.getMonth() + 1;
  var to_day =today.getDate();
  var to_day =today.getDate();
  var to_hours = today.getHours();
  var to_minutes = today.getMinutes();
  var to_seconds = today.getSeconds();
  gulp.src(BASE_PATH +"/**/*")
  .pipe(gulp.dest("./release_wrap/"+to_year+to_month+to_day+to_hours+to_minutes+to_seconds));
});
//////brwsync/////

gulp.task("brwsync" ,function(){
  brwsync({
    proxy:proxy_Name,//動的ページの場合　// 静的ページの場合：server
    files:base_Dir_theme
  });
});


gulp.task('default',function(){
  gulp.watch(WATCH_SCSS, ['sass']);
  gulp.watch(WATCH_JS, ['js']);
  gulp.watch(WATCH_IMG, ['imagesmin']);
});
