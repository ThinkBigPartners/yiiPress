module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    reload : {
      port: 81,
      proxy : {
        host: 'roverrain.local',
        port : 80
      }
    },
    watch : {
      files : ['layout.html', 'index.html','components/*','js/*','css/*','templates/*', 'js/views/*','wp/wp-content/themes/twentythirteen/*'],
      tasks : ['reload']
    }
  });

  grunt.loadNpmTasks('grunt-contrib-connect');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-reload');

  grunt.registerTask('default', ['reload','watch']);

};