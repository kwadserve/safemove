/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2016 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
(function(document, window, $) {
  'use strict';

  var Site = window.Site;

  $(document).ready(function($) {
    Site.run();
  });

  // Treeview
  // ---------
  (function() {
    var data = [{
      text: 'assets',
      href: '#assets',
      state: {
        expanded: false
      },
      nodes: [{
        text: 'css',
        href: '#css',
        nodes: [{
          text: 'bootstrap.css',
          href: '#bootstrap.css',
          icon: 'fa fa-file-code-o'
        }, {
          text: 'site.css',
          href: '#site.css',
          icon: 'fa fa-file-code-o'
        }]
      }, {
        text: 'fonts',
        href: '#fonts',
        nodes: [{
          text: 'font-awesome',
          href: '#font-awesome'
        }, {
          text: 'web-icons',
          href: '#web-icons'
        }]
      }, {
        text: 'images',
        href: '#images',
        nodes: [{
          text: 'logo.png',
          href: '#logo.png',
          icon: 'fa fa-file-photo-o'
        }, {
          text: 'bg.png',
          href: '#bg.png',
          icon: 'fa fa-file-photo-o'
        }]
      }]
    }, {
      text: 'grunt',
      href: '#grunt',
      state: {
        expanded: false
      },
      nodes: [{
        text: 'autoprefixer.js',
        href: '#autoprefixer.js',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'clean.js',
        href: '#clean.js',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'concat.js',
        href: '#concat.js',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'csscomb.js',
        href: '#csscomb.js',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'cssmin.js',
        href: '#cssmin.js',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'less.js',
        href: '#less.js',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'uglify.js',
        href: '#uglify.js',
        icon: 'fa fa-file-code-o'
      }]
    }, {
      text: 'html',
      href: '#html',
      state: {
        expanded: true
      },
      nodes: [{
        text: 'blog.html',
        href: '#blog.html',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'docs.html',
        href: '#docs.html',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'index.html',
        href: '#index.html',
        state: {
          selected: true
        },
        icon: 'fa fa-file-code-o'
      }]
    }, {
      text: 'media',
      href: '#media',
      state: {
        expanded: false
      },
      nodes: [{
        text: 'audio.mp3',
        href: '#audio.mp3',
        icon: 'fa fa-file-audio-o'
      }, {
        text: 'video.mp4',
        href: '#video.mp4',
        icon: 'fa fa-file-video-o'
      }]
    }, {
      text: 'Gruntfile.js',
      href: '#Gruntfile.js',
      icon: 'fa fa-file-code-o'
    }, {
      text: 'bower.json',
      href: '#bower.json',
      icon: 'fa fa-file-code-o'
    }, {
      text: 'README.pdf',
      href: '#README.pdf',
      icon: 'fa fa-file-pdf-o'
    }, {
      text: 'package.json',
      href: '#package.json',
      icon: 'fa fa-file-code-o'
    }];

    var defaults = $.components.getDefaults("treeview");

    var options = $.extend({}, defaults, {
      levels: 1,
      color: false,
      backColor: false,
      borderColor: false,
      onhoverColor: false,
      selectedColor: false,
      selectedBackColor: false,
      searchResultColor: false,
      searchResultBackColor: false,
      data: data,
      highlightSelected: true
    });

    $('#filesTree').treeview(options);
  })();

  // Codemirror
  // ----------
  CodeMirror.fromTextArea(document.getElementById('code'), {
    lineNumbers: !0,
    theme: 'eclipse',
    mode: 'text/html',
    scrollbarStyle: "simple"
  });

  // Contextmenu
  // -----------
  $("#filesTree").contextmenu({
    target: "#filesContextMenu"
  });

})(document, window, jQuery);
