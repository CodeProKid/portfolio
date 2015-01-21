var config       = require('./package'),
    gulp         = require('gulp'),
    util         = require('gulp-util'),
    concat       = require('gulp-concat'),
    sass         = require('gulp-sass'),
    uglify       = require('gulp-uglify')
    minCSS       = require('gulp-minify-css'),
    rename       = require('gulp-rename'),
    colors       = require('colors'),
    replace      = require('gulp-replace'),
    crypto       = require('crypto'),
    fs           = require('fs'),
    sys          = require('sys'),
    iconfont     = require('gulp-iconfont'),
    consolidate  = require('gulp-consolidate'),
    prefix       = require('gulp-autoprefixer'),
    exec         = require('child_process').exec;
    // hash    = crypto.createHash('md5').update(new Date().toString()).digest("hex");

    // function  puts(error, stdout, stderr) { sys.puts(stdout) }

// fs.writeFileSync('./version.json', JSON.stringify({"version": hash}));

var paths = {
  scripts: {
    app: [
      'src/scripts/modules/*.js',
      'src/scripts/main.js'
    ],
    vendor: [
      'bower_components/flexslider/jquery.flexslider.js',
      'src/scripts/vendor/*.js'
    ],
    singles: [
      'bower_components/modernizr/modernizr.js',
    ],
    dest: {
      app: 'public/js',
      vendor: 'public/js/vendor'
    }
  },
  styles: {
    app: 'src/sass/**/*.scss',
    dest: 'public/css'
  },
  icons: {
    src: 'src/icons/*.svg',
    dest: 'public/fonts',
    template: 'src/icons/_icons.scss',
    tempdest: 'src/sass'
  }
};

// **************** //
// ** Icon Font ** //
// **************** //

gulp.task('Iconfont', function(){
  gulp.src(paths.icons.src)
    .pipe(iconfont({
      fontName: 'Icons', // required
      appendCodepoints: true // recommended option
    }))
      .on('codepoints', function(codepoints, options) {
        gulp.src(paths.icons.template)
          .pipe(consolidate('lodash', {
            glyphs: codepoints,
            fontName: 'Icons',
            fontPath: '../fonts/',
            className: 'ico'
          }))
          .pipe(gulp.dest(paths.icons.tempdest));
        console.log(codepoints, options);
      })
    .pipe(gulp.dest(paths.icons.dest));
});

// **************** //
// ** JavaScript ** //
// **************** //

// Compiles custom JavaScript application
gulp.task('js.app', function() {
  gulp.src(paths.scripts.app)
    // For production
    .pipe(uglify())
    .pipe(concat('app.min.js'))
    .pipe(gulp.dest(paths.scripts.dest.app));
  // Log done
  console.log('[' + '.js'.green + '] - app.js           Finished');
});

// Compiles vendor JavaScripts
gulp.task('js.vendor', function() {
  gulp.src(paths.scripts.vendor)
    .pipe(uglify())
    .pipe(concat('vendor.min.js'))
    .pipe(gulp.dest(paths.scripts.dest.vendor));
  console.log('[' + '.js'.green + '] - vendor.min.js    Finished');
});

// Compiles JavaScript singles
gulp.task('js.singles', function() {
  gulp.src(paths.scripts.singles)
    .pipe(uglify())
    .pipe(gulp.dest(paths.scripts.dest.vendor));
  console.log('[' + '.js'.green + '] - vendor singles   Finished');
});

// **************** //
// ***** SASS ***** //
// **************** //

// Compiles custom sass
gulp.task('sass.app', function () {
  gulp.src(paths.styles.app)
    .pipe(sass())
    .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
    .on('error', function (err) {
      return console.log('[' + '.css'.green + '] - ' + err);
    })
    // Production
    .pipe(minCSS())
    .pipe(gulp.dest(paths.styles.dest));
  console.log('[' + '.css'.green + '] - app.css        Finished');
});


// Watch
gulp.task('watch', function () {
  gulp.watch(paths.scripts.app, ['js.app']);
  gulp.watch(paths.scripts.vendor, ['js.vendor']);
  gulp.watch(paths.scripts.singles, ['js.singles']);
  gulp.watch(paths.styles.app, ['sass.app']);
});

gulp.task('default', ['js.app','js.vendor','js.singles','sass.app','watch']);