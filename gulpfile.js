// Defining requirements
var gulp = require( 'gulp' );
var plumber = require( 'gulp-plumber' );
var sass = require( 'gulp-sass' );
var rename = require( 'gulp-rename' );
var uglify = require( 'gulp-uglify' );
var sourcemaps = require( 'gulp-sourcemaps' );
var cleanCSS = require( 'gulp-clean-css' );
var gulpSequence = require( 'gulp-sequence' );
var autoprefixer = require( 'gulp-autoprefixer' );
var concat = require( 'gulp-concat' );

// Configuration file to keep your code DRY
var paths = {
      "js": "./js",
      "css": "./css",
      "sass": "./src"
    }
  
    
// gulp sass
// Compiles SCSS files in CSS
gulp.task( 'sass', function() {
    var stream = gulp.src( paths.sass + '/*.scss' )
        .pipe( plumber( {
            errorHandler: function( err ) {
                console.log( err );
                this.emit( 'end' );
            }
        } ) )
        .pipe( sass( { errLogToConsole: true } ) )
        .pipe( autoprefixer( 'last 2 versions' ) )
        .pipe( gulp.dest( paths.css ) )
        .pipe( rename( 'theme.css' ) );
    return stream;
});

// gulp sass
// Compress CSS
gulp.task( 'minifycss', function() {
  return gulp.src( paths.css + '/theme.css' )
  .pipe( sourcemaps.init( { loadMaps: true } ) )
    .pipe( cleanCSS( { compatibility: '*' } ) )
    .pipe( plumber( {
            errorHandler: function( err ) {
                console.log( err ) ;
                this.emit( 'end' );
            }
        } ) )
    .pipe( rename( { suffix: '.min' } ) )
    .pipe( sourcemaps.write( './' ) )
    .pipe( gulp.dest( paths.css ) );
});

// gulp styles
// Compile SASS + Compress 
gulp.task( 'styles', function( callback ) {
    gulpSequence( 'sass', 'minifycss' )( callback );
} );


// Run: 
// gulp scripts. 
// Uglifies and concat all JS files into one
gulp.task( 'scripts', function() {
    var js_list = [
        // bootstrap
        'node_modules/bootstrap/dist/js/bootstrap.js',
        'src/theme.js'
    ];
  gulp.src( js_list )
    .pipe(concat('theme.min.js'))
    .pipe( uglify() )
    .pipe( gulp.dest( paths.js ) )
    .pipe( rename( { suffix: '.min' } ) );

});



// Run
// gulp build
gulp.task( 'build', function( callback ) {
    gulpSequence( 'styles', 'scripts' )( callback );
} );
