# fFbUK
This software has been designed to make writing feedback on coursework more time-efficient and more consistent. This allows lecturers to more easily meet marking deadlines, and improves the quality of feedback provided to students.

**Templates**

At the core of the fFBUK system is the template format. Anyone can create their own custom template for the modules they teach, and circulate these among PGTAs or anyone else that might be helping to mark an assignment.
The template consists of ‘sections’ - different parts of the coursework to be marked, for example Introduction, Results or Discussion. The names of the sections can be changed to suit the module being marked; the intention is for the sections to match the different parts of the mark scheme.
Within each section, there are ‘positive’ and ‘negative’ lists of comments. Again, these are fully customisable by the user to suit their own needs. The lists consist of comments that are commonly made on that module’s coursework - these are often things that are already known by the lecturer, unless it is their first year teaching the module. It is possible to come back and add extra comments later if required.
Each section can also have an optional mark scheme image attached. This must be created and uploaded by the user, and can be viewed on the marking page so the user does not have to switch windows.
The templates are saved into a zip file, which can be loaded directly into the marking page. The zip file contains a .json file, which stores all the sections and their corresponding comments. Also present is an ‘img’ folder, containing the mark scheme images uploaded by the user.
The user does not need to unzip the template folder or see its contents! The zip file can easily be circulated among other people who might need to use it for marking, and they can make their own edits if necessary and save a copy.

**Template Creation**

The template creation page is used to create new templates or edit existing ones. The user can freely add, edit and delete elements of the template (sections/comments/mark scheme images) in either case. When finished, the user downloads the template zip file to their computer for later use.

**Marking**

The user selects the reports they want to mark, and then selects a ‘template’ to mark them with. The template loads all the sections and comments - they cannot be edited on this page. Clicking on ‘Positive’ or ‘Negative’ in a section will show the corresponding comments, and clicking on individual comments will add them to the corresponding text box. The user can also type freely in the text box itself, allowing more specific or unique feedback to be added dependent on the particular piece of coursework. When all the feedback is written, clicking ‘Compile Comments’ at the bottom of the page will write all the feedback into a single text box. Clicking ‘Save and Load Next Document’ will save the feedback to either PDF or a text file, as selected by the user - it is not necessary to compile the comments first. The output file is saved with the same name as the input coursework file - this is important for uploading the feedback back to Canvas, so the names should not be changed.

**Use with Canvas**

The user should download all the submissions from the Canvas assignment page, and load those files into the fFBUK software. The feedback should be saved into another folder. When all feedback is written, the feedback folder can be zipped and uploaded to Canvas - if the names are not changed, Canvas will automatically assign the correct feedback to the students.

It is not currently possible to assign grades using the fFBUK software - this would require an element of Canvas integration, or a further user input. However, Canvas allows a ‘gradebook’ .csv file to be used. This can be downloaded from the Grades -> Export button in the module page. The gradebook can be filled in alongside the production of feedback, and then imported back into Canvas - again, the assignment of grades to students is completed automatically. Due to the nature of the gradebook file structure, we were unable to figure out how to automatically fill it from the fFBUK software, but this could be something to look into in the future.

Many lecturers use Canvas Speedgrader to mark. One possible way of using fFBUK alongside Speedgrader is by loading the corresponding report into fFBUK, writing the feedback, and then copying the compiled feedback into the Comments section within Speedgrader.

**Version history:**
Each version contains sub-versions. As of 25/08/17, the most recent version is Beta Version 3-3, in the Version 3 folder.

Version 1: Proof-of-concept. Bare bones functionality.
Version 2: Template functionality added - create/edit functions and loading template into marking.
Version 3: Mark scheme functionality added. Video tutorials added. ‘Final’ version before the next phase of development.
