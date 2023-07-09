import $ from "jquery"
class MyNotes {
    constructor() {
        this.events()
    }

    events() {
        $(".delete-note").on("click", this.deleteNote)
        $(".edit-note").on("click", this.editNote)
    }

    editNote(e) {
        const thisNote = $(e.target).parents("li");
        thisNote.find(".note-title-field, .note-body-field").removeAttr("readonly").addClass("note-active-field")
        thisNote.find(".update-note").addClass("update-note--visible")
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
}

export default MyNotes