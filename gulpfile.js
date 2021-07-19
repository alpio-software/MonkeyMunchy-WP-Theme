const rename = require('gulp-rename');
const gulp = require('gulp');
const zip = require('gulp-zip');
const wpPot = require('gulp-wp-pot');
const homeDir = require('os').homedir();
const desktopDir = `${homeDir}/Desktop`;

exports.zip = () =>
    gulp
        .src(
            [
                '**/*',
                '!node_modules/**',
                '!vendor/**',
                '!src/**',
                '!.browserslistrc',
                '!.eslintrc.js',
                '!.prettierrc',
                '!gulpfile.js',
                '!postcss.config.js',
                '!phpcs.xml.dist',
                '!package.json',
                '!composer.json',
                '!composer.lock',
                '!package-lock.json',
                '!webpack.config.js',
                '!.idea/**',
            ],
            {
                base: '.',
            }
        )
        .pipe(
            rename(function (path) {
                path.dirname = 'mm/' + path.dirname;
            })
        )
        .pipe(zip('mm.zip'))
        .pipe(gulp.dest(desktopDir));

gulp.task('pot', function () {
    return gulp
        .src('**/*.php')
        .pipe(
            wpPot({
                domain: 'mm',
                package: 'Monkey Munchy',
            })
        )
        .pipe(gulp.dest('languages/mm.pot'));
});
