       PMA_ajaxRemoveMessage($msg);
                    // Show the query that we just executed
                    PMA_slidingMessage(data.sql_query);
                    PMA_reloadNavigation();
                } else {
                    PMA_ajaxShowMessage(data.error, false);
                }
            }); // end $.post()
        }); // end $.PMA_confirm()
    },

    dropMultipleDialog: function ($this) {
        // We ask for confirmation here
        $this.PMA_confirm(PMA_messages.strDropRTEitems, '', function (url) {
            /**
             * @var msg jQuery object containing the reference to
             *          the AJAX message shown to the user
             */
            var $msg = PMA_ajaxShowMessage(PMA_messages.strProcessingRequest);

            // drop anchors of all selected rows
            var drop_anchors = $('input.checkall:checked').parents('tr').find('.drop_anchor');
            var success = true;
            var count = drop_anchors.length;
            var returnCount = 0;

            drop_anchors.each(function () {
                var $anchor = $(this);
                /**
                 * @var $curr_row Object containing reference to the current row
                 */
                var $curr_row = $anchor.parents('tr');
                var params = getJSConfirmCommonParam(this, $anchor.getPostData());
                $.post($anchor.attr('href'), params, function (data) {
                    returnCount++;
                    if (data.success === true) {
                        /**
                         * @var $table Object containing reference
                         *             to the main list of elements
                         */
                        var $table = $curr_row.parent();
                        // Check how many rows will be left after we remove
                        // the one that the user has requested us to remove
                        if ($table.find('tr').length === 3) {
                            // If there are two rows left, it means that they are
                            // the header of the table and the rows that we are
                            // about to remove, so after the removal there will be
                            // nothing to show in the table, so we hide it.
                            $table.hide('slow', function () {
                                $(this).find('tr.even, tr.odd').remove();
                                $('.withSelected').remove();
                                $('#nothing2display').show('slow');
                            });
                        } else {
                            $curr_row.hide('fast', function () {
                                $(this).remove();
                                // Now we have removed the row from the list, but maybe
                                // some row classes are wrong now. So we will itirate
                                // throught all rows and assign correct classes to them.
                                /**
                                 * @var ct Count of processed rows
                                 */
                                var ct = 0;
                                /**
                                 * @var rowclass Class to be attached to the row
                                 *               that is being processed
                                 */
                                var rowclass = '';
                                $table.find('tr').has('td').each(function () {
                                    rowclass = (ct % 2 === 1) ? 'odd' : 'even';
                                    $(this).removeClass().addClass(rowclass);
                                    ct++;
                                });
                            });
                        }
                        if (returnCount === count) {
                            if (success) {
                                // Get rid of the "Loading" message
                                PMA_ajaxRemoveMessage($msg);
                                $('#rteListForm_checkall').prop({ checked: false, indeterminate: false });
                            }
                            PMA_reloadNavigation();
                        }
                    } else {
                        PMA_ajaxShowMessage(data.error, false);
                        success = false;
                        if (returnCount === count) {
                            PMA_reloadNavigation();
                        }
                    }
                }); // end $.post()
            }); // end drop_anchors.each()
        }); // end $.PMA_confirm()
    }
}; // end RTE namespace

/**
 * @var RTE.EVENT JavaScript functionality for events
 */
RTE.EVENT = {
    validateCustom: function () {
        /**
         * @var elm a jQuery object containing the reference
         *          to an element that is being validated
         */
        var $elm = null;
        if (this.$ajaxDialog.find('select[name=item_type]').find(':selected').val() === 'RECURRING') {
            // The interval field must not be empty for recurring events
            $elm = this.$ajaxDialog.find('input[name=item_interval_value]');
            if ($elm.val() === '') {
                $elm.focus();
                alert(PMA_messages.strFormEmpty);
                return false;
            }
        } else {
            // The execute_at field must not be empty for "once off" events
            $elm = this.$ajaxDialog.find('input[name=item_execute_at]');
            if ($elm.val() === '') {
                $elm.focus();
                alert(PMA_messages.strFormEmpty);
                return false;
            }
        }
        return true;
    }
};

/**
 * @var RTE.ROUTINE JavaScript functionality for routines
 */
RTE.ROUTINE = {
    /**
     * Overriding the postDialogShow() function defined in common.js
     *
     * @param data JSON-encoded data from the ajax request
     */
    postDialogShow: function (data) {
        // Cache the template for a parameter table row
        RTE.param_template = data.param_template;
        var that = this;
        // Make adjustments in the dialog to make it AJAX compatible
        $('td.routine_param_remove').show();
  