(function() {

  jQuery(function() {
    $.tags = function(element, options) {
      var key, tag, tagData, value, _i, _len, _ref,
        _this = this;
      if (options == null) {
        options = {};
      }
      for (key in options) {
        value = options[key];
        this[key] = value;
      }
      this.readOnly || (this.readOnly = false);
      this.suggestions || (this.suggestions = []);
      this.restrictTo = (options.restrictTo != null ? options.restrictTo.concat(this.suggestions) : false);
      this.exclude || (this.exclude = false);
      this.displayPopovers = (options.popovers != null ? true : options.popoverData != null);
      this.popoverTrigger || (this.popoverTrigger = 'hover');
      this.tagClass || (this.tagClass = 'btn-info');
      this.promptText || (this.promptText = 'Enter tags...');
      this.readOnlyEmptyMessage || (this.readOnlyEmptyMessage = 'No tags to display...');
      this.beforeAddingTag || (this.beforeAddingTag = function(tag) {});
      this.afterAddingTag || (this.afterAddingTag = function(tag) {});
      this.beforeDeletingTag || (this.beforeDeletingTag = function(tag) {});
      this.afterDeletingTag || (this.afterDeletingTag = function(tag) {});
      this.definePopover || (this.definePopover = function(tag) {
        return "associated content for \"" + tag + "\"";
      });
      this.excludes || (this.excludes = function() {
        return false;
      });
      this.tagRemoved || (this.tagRemoved = function(tag) {});
      this.pressedReturn || (this.pressedReturn = function(e) {});
      this.pressedDelete || (this.pressedDelete = function(e) {});
      this.pressedDown || (this.pressedDown = function(e) {});
      this.pressedUp || (this.pressedUp = function(e) {});
      this.$element = $(element);
      if (options.tagData != null) {
        this.tagsArray = options.tagData;
      } else {
        tagData = $('.tag-data', this.$element).html();
        this.tagsArray = (tagData != null ? tagData.split(',') : []);
      }
      if (options.popoverData) {
        this.popoverArray = options.popoverData;
      } else {
        this.popoverArray = [];
        _ref = this.tagsArray;
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          tag = _ref[_i];
          this.popoverArray.push(null);
        }
      }
      this.getTags = function() {
        return _this.tagsArray;
      };
      this.getTagsContent = function() {
        return _this.popoverArray;
      };
      this.getTagsWithContent = function() {
        var combined, i, _j, _ref1;
        combined = [];
        for (i = _j = 0, _ref1 = _this.tagsArray.length - 1; 0 <= _ref1 ? _j <= _ref1 : _j >= _ref1; i = 0 <= _ref1 ? ++_j : --_j) {
          combined.push({
            tag: _this.tagsArray[i],
            content: _this.popoverArray[i]
          });
        }
        return combined;
      };
      this.getTag = function(tag) {
        var index;
        index = _this.tagsArray.indexOf(tag);
        if (index > -1) {
          return _this.tagsArray[index];
        } else {
          return null;
        }
      };
      this.getTagWithContent = function(tag) {
        var index;
        index = _this.tagsArray.indexOf(tag);
        return {
          tag: _this.tagsArray[index],
          content: _this.popoverArray[index]
        };
      };
      this.hasTag = function(tag) {
        return _this.tagsArray.indexOf(tag) > -1;
      };
      this.removeTagClicked = function(e) {
        if (e.currentTarget.tagName === "A") {
          _this.removeTag(e.currentTarget.previousSibling.textContent);
          $(e.currentTarget.parentNode).remove();
        }
        return _this;
      };
      this.removeLastTag = function() {
        var el;
        el = $('.tag', _this.$element).last();
        el.remove();
        _this.removeTag(_this.tagsArray[_this.tagsArray.length - 1]);
        return _this;
      };
      this.removeTag = function(tag) {
        if (_this.tagsArray.indexOf(tag) > -1) {
          _this.beforeDeletingTag(tag);
          _this.popoverArray.splice(_this.tagsArray.indexOf(tag), 1);
          _this.tagsArray.splice(_this.tagsArray.indexOf(tag), 1);
          _this.renderTags();
          _this.afterDeletingTag(tag);
        }
        return _this;
      };
      this.addTag = function(tag) {
        var associatedContent;
        if ((_this.restrictTo === false || _this.restrictTo.indexOf(tag) !== -1) && _this.tagsArray.indexOf(tag) < 0 && tag.length > 0 && (_this.exclude === false || _this.exclude.indexOf(tag) === -1) && !_this.excludes(tag)) {
          _this.beforeAddingTag(tag);
          associatedContent = _this.definePopover(tag);
          _this.popoverArray.push(associatedContent || null);
          _this.tagsArray.push(tag);
          _this.afterAddingTag(tag);
          _this.renderTags();
        }
        return _this;
      };
      this.addTagWithContent = function(tag, content) {
        if ((_this.restrictTo === false || _this.restrictTo.indexOf(tag) !== -1) && _this.tagsArray.indexOf(tag) < 0 && tag.length > 0) {
          _this.beforeAddingTag(tag);
          _this.tagsArray.push(tag);
          _this.popoverArray.push(content);
          _this.afterAddingTag(tag);
          _this.renderTags();
        }
        return _this;
      };
      this.renameTag = function(name, newName) {
        _this.tagsArray[_this.tagsArray.indexOf(name)] = newName;
        _this.renderTags();
        return _this;
      };
      this.setPopover = function(tag, popoverContent) {
        _this.popoverArray[_this.tagsArray.indexOf(tag)] = popoverContent;
        _this.renderTags();
        return _this;
      };
      this.keyDownHandler = function(e) {
        var k, numSuggestions;
        k = (e.keyCode != null ? e.keyCode : e.which);
        switch (k) {
          case 13:
            _this.pressedReturn(e);
            tag = e.target.value;
            if (_this.suggestedIndex !== -1) {
              tag = _this.suggestionList[_this.suggestedIndex];
            }
            _this.addTag(tag);
            e.target.value = '';
            _this.renderTags();
            return _this.hideSuggestions();
          case 46:
          case 8:
            _this.pressedDelete(e);
            if (e.target.value === '') {
              _this.removeLastTag();
            }
            if (e.target.value.length === 1) {
              return _this.hideSuggestions();
            }
            break;
          case 40:
            _this.pressedDown(e);
            if (_this.input.val() === '' && (_this.suggestedIndex === -1 || !(_this.suggestedIndex != null))) {
              _this.makeSuggestions(e, true);
            }
            numSuggestions = _this.suggestionList.length;
            _this.suggestedIndex = (_this.suggestedIndex < numSuggestions - 1 ? _this.suggestedIndex + 1 : numSuggestions - 1);
            _this.selectSuggested(_this.suggestedIndex);
            if (_this.suggestedIndex >= 0) {
              return _this.scrollSuggested(_this.suggestedIndex);
            }
            break;
          case 38:
            _this.pressedUp(e);
            _this.suggestedIndex = (_this.suggestedIndex > 0 ? _this.suggestedIndex - 1 : 0);
            _this.selectSuggested(_this.suggestedIndex);
            if (_this.suggestedIndex >= 0) {
              return _this.scrollSuggested(_this.suggestedIndex);
            }
            break;
          case 9:
          case 27:
            _this.hideSuggestions();
            return _this.suggestedIndex = -1;
        }
      };
      this.keyUpHandler = function(e) {
        var k;
        k = (e.keyCode != null ? e.keyCode : e.which);
        if (k !== 40 && k !== 38 && k !== 27) {
          return _this.makeSuggestions(e, false);
        }
      };
      this.makeSuggestions = function(e, overrideLengthCheck) {
        var val;
        val = (e.target.value != null ? e.target.value : e.target.textContent);
        _this.suggestedIndex = -1;
        _this.$suggestionList.html('');
        _this.suggestionList = [];
        $.each(_this.suggestions, function(i, suggestion) {
          if (_this.tagsArray.indexOf(suggestion) < 0 && suggestion.substring(0, val.length) === val && (val.length > 0 || overrideLengthCheck)) {
            _this.$suggestionList.append('<li class="tags-suggestion">' + suggestion + '</li>');
            return _this.suggestionList.push(suggestion);
          }
        });
        $('.tags-suggestion', _this.$element).mouseover(_this.selectSuggestedMouseOver);
        $('.tags-suggestion', _this.$element).click(_this.suggestedClicked);
        if (_this.suggestionList.length > 0) {
          return _this.showSuggestions();
        } else {
          return _this.hideSuggestions();
        }
      };
      this.suggestedClicked = function(e) {
        tag = e.target.textContent;
        if (_this.suggestedIndex !== -1) {
          tag = _this.suggestionList[_this.suggestedIndex];
        }
        _this.addTag(tag);
        _this.input.val('');
        _this.makeSuggestions(e, false);
        _this.input.focus();
        return _this.hideSuggestions();
      };
      this.hideSuggestions = function() {
        return $('.tags-suggestion-list', _this.$element).css({
          display: "none"
        });
      };
      this.showSuggestions = function() {
        return $('.tags-suggestion-list', _this.$element).css({
          display: "block"
        });
      };
      this.selectSuggestedMouseOver = function(e) {
        $('.tags-suggestion').removeClass('tags-suggestion-highlighted');
        $(e.target).addClass('tags-suggestion-highlighted');
        $(e.target).mouseout(_this.selectSuggestedMousedOut);
        return _this.suggestedIndex = $('.tags-suggestion', _this.$element).index($(e.target));
      };
      this.selectSuggestedMousedOut = function(e) {
        return $(e.target).removeClass('tags-suggestion-highlighted');
      };
      this.selectSuggested = function(i) {
        var tagElement;
        $('.tags-suggestion').removeClass('tags-suggestion-highlighted');
        tagElement = $('.tags-suggestion', _this.$element).eq(i);
        return tagElement.addClass('tags-suggestion-highlighted');
      };
      this.scrollSuggested = function(i) {
        var pos, tagElement, topElement, topPos;
        tagElement = $('.tags-suggestion', _this.$element).eq(i);
        topElement = $('.tags-suggestion', _this.$element).eq(0);
        pos = tagElement.position();
        topPos = topElement.position();
        if (pos != null) {
          return $('.tags-suggestion-list', _this.$element).scrollTop(pos.top - topPos.top);
        }
      };
      this.adjustInputPosition = function() {
        var pBottom, pLeft, pTop, pWidth, tagElement, tagPosition;
        tagElement = $('.tag', _this.$element).last();
        tagPosition = tagElement.position();
        pLeft = tagPosition != null ? tagPosition.left + tagElement.outerWidth(true) : 0;
        pTop = tagPosition != null ? tagPosition.top : 0;
        pWidth = _this.$element.width() - pLeft;
        $('.tags-input', _this.$element).css({
          paddingLeft: pLeft,
          paddingTop: pTop,
          width: pWidth
        });
        pBottom = tagPosition != null ? tagPosition.top + tagElement.outerHeight(true) : 22;
        return _this.$element.css({
          paddingBottom: pBottom - _this.$element.height()
        });
      };
      this.renderTags = function() {
        var tagList;
        tagList = $('.tags', _this.$element);
        tagList.html('');
        _this.input.attr('placeholder', (_this.tagsArray.length === 0 ? _this.promptText : ''));
        $.each(_this.tagsArray, function(i, tag) {
          tag = $(_this.formatTag(i, tag));
          $('a', tag).click(_this.removeTagClicked);
          $('a', tag).mouseover(_this.toggleCloseColor);
          $('a', tag).mouseout(_this.toggleCloseColor);
          if (_this.displayPopovers) {
            _this.initializePopoverFor(tag, _this.tagsArray[i], _this.popoverArray[i]);
          }
          return tagList.append(tag);
        });
        return _this.adjustInputPosition();
      };
      this.renderReadOnly = function() {
        var tagList;
        tagList = $('.tags', _this.$element);
        tagList.html((_this.tagsArray.length === 0 ? _this.readOnlyEmptyMessage : ''));
        return $.each(_this.tagsArray, function(i, tag) {
          tag = $(_this.formatTagReadOnly(i, tag));
          if (_this.displayPopovers) {
            _this.initializePopoverFor(tag, _this.tagsArray[i], _this.popoverArray[i]);
          }
          return tagList.append(tag);
        });
      };
      this.initializePopoverFor = function(tag, title, content) {
        options = {
          title: title,
          content: content,
          placement: 'bottom'
        };
        if (_this.popoverTrigger === 'hoverShowClickHide') {
          $(tag).mouseover(function() {
            $(tag).popover('show');
            return $('.tag').not(tag).popover('hide');
          });
          $(document).click(function() {
            return $(tag).popover('hide');
          });
        } else {
          options.trigger = _this.popoverTrigger;
        }
        return $(tag).popover(options);
      };
      this.toggleCloseColor = function(e) {
        var opacity, tagAnchor;
        tagAnchor = $(e.currentTarget);
        opacity = tagAnchor.css('opacity');
        opacity = (opacity < 0.8 ? 1.0 : 0.6);
        return tagAnchor.css({
          opacity: opacity
        });
      };
      this.formatTag = function(i, tag) {
        if (_this.displayPopovers === true) {
          return "<div class='tag label " + _this.tagClass + "' rel='popover'><span>" + tag + "</span><a> <i class='icon-remove-sign icon-white'></i></a></div>";
        } else {
          return "<div class='tag label " + _this.tagClass + "'><span>" + tag + "</span><a> <i class='icon-remove-sign icon-white'></i></a></div>";
        }
      };
      this.formatTagReadOnly = function(i, tag) {
        if (_this.displayPopovers === true) {
          return "<div class='tag label " + _this.tagClass + "' rel='popover'><span>&nbsp;" + tag + "&nbsp;</span></div>";
        } else {
          return "<div class='tag label " + _this.tagClass + "'><span>&nbsp;" + tag + "&nbsp;</span></div>";
        }
      };
      this.addDocumentListeners = function() {
        return $(document).mouseup(function(e) {
          var container;
          container = $('.tags-suggestion-list', _this.$element);
          if (container.has(e.target).length === 0) {
            return _this.hideSuggestions();
          }
        });
      };
      this.init = function() {
        if (this.readOnly) {
          this.renderReadOnly();
          this.removeTag = function() {};
          this.removeTagClicked = function() {};
          this.removeLastTag = function() {};
          this.addTag = function() {};
          this.addTagWithContent = function() {};
          this.renameTag = function() {};
          return this.setPopover = function() {};
        } else {
          this.input = $("<input type='text' class='tags-input'>");
          this.input.keydown(this.keyDownHandler);
          this.input.keyup(this.keyUpHandler);
          this.$element.append(this.input);
          this.$suggestionList = $('<ul class="tags-suggestion-list dropdown-menu"></ul>');
          this.$element.append(this.$suggestionList);
          this.renderTags();
          return this.addDocumentListeners();
        }
      };
      this.init();
      return this;
    };
    return $.fn.tags = function(options) {
      var stopOn, tagsObject;
      tagsObject = {};
      stopOn = (typeof options === "number" ? options : -1);
      this.each(function(i, el) {
        var $el;
        $el = $(el);
        if ($el.data('tags') == null) {
          $el.data('tags', new $.tags(this, options));
        }
        if (stopOn === i || i === 0) {
          return tagsObject = $el.data('tags');
        }
      });
      return tagsObject;
    };
  });

}).call(this);