import $ from "jquery"
class MyNotes {
    constructor() {
        this.events()
    }

    events() {
        $(".delete-note").on("click", this.deleteNote)
        $(".edit-note").on("click", this.editNote.bind(this))
        $(".update-note").on("click", this.updateNote.bind(this))
        $(".submit-note").on("click", this.createNote.bind(this))
    }

    editNote(e) {
        const thisNote = $(e.target).parents("li");
       if (thisNote.data("state") === "editable") {
           this.makeNoteReadOnly(thisNote)
       } else {
           this.makeNoteEditable(thisNote)
       }
    }

    makeNoteEditable(thisNote) {
        thisNote.find(".edit-note").html(`
            <i class="fa fa-times" aria-hidden="true"></i>Cancel
        `)
        thisNote.find(".note-title-field, .note-body-field").removeAttr("readonly").addClass("note-active-field")
        thisNote.find(".update-note").addClass("update-note--visible")
        thisNote.data("state", "editable")
    }

    makeNoteReadOnly(thisNote) {
        thisNote.find(".edit-note").html(`
            <i class="fa fa-pencil" aria-hidden="true"></i>Edit
        `)
        thisNote.find(".note-title-field, .note-body-field").attr("readonly", "readonly").removeClass("note-active-field")
        thisNote.find(".update-note").removeClass("update-note--visible")
        thisNote.data("state", "cancel")
    }

    deleteNote(e) {
        const thisNote = $(e.target).parents("li");
        $.ajax({
            beforeSend: (xhr) => {
                xhr.setRequestHeader('X-WP-Nonce', siteData.nonce)
            },
            url: siteData.root_url + '/wp-json/wp/v2/note/' + thisNote.data("id"),
            method: 'DELETE',
            success: (response) => {
                thisNote.slideUp()
                console.log("DELETED")
                console.log(response)
            },
            error: (response) => {
                console.log("ERROR")
                console.log(response)
            }
        })
    }

    updateNote(e) {
        const thisNote = $(e.target).parents("li");

        const updatedPostAttribute = {
            title: thisNote.find(".note-title-field").val(),
            content: thisNote.find(".note-body-field").val()
        }
        $.ajax({
            beforeSend: (xhr) => {
                xhr.setRequestHeader('X-WP-Nonce', siteData.nonce)
            },
            url: siteData.root_url + '/wp-json/wp/v2/note/' + thisNote.data("id"),
            method: 'POST',
            data: updatedPostAttribute,
            success: (response) => {
                this.makeNoteReadOnly(thisNote)
                console.log("DELETED")
                console.log(response)
            },
            error: (response) => {
                console.log("ERROR")
                console.log(response)
            }
        })
    }

    createNote(e) {
        const newNoteAttribute = {
            title: $(".new-note-title").val(),
            content: $(".new-note-body").val(),
        }
        $.ajax({
            beforeSend: (xhr) => {
                xhr.setRequestHeader('X-WP-Nonce', siteData.nonce)
            },
            url: siteData.root_url + '/wp-json/wp/v2/note/',
            method: 'POST',
            data: newNoteAttribute,
            success: (response) => {
                $(".new-note-title, .new-note-body").val()
                $(`
                    <li>Test Date</li>
                `).prepend("#my-notes").hide().slideDown()
            },
            error: (response) => {
                console.log("ERROR")
                console.log(response)
            }
        })
    }
}

export default MyNotes