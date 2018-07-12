**********************************
DOCUMENTATION FOR FAST FEEDBACK UK
**********************************

The functionality of the software should be clear from the user interface. This documentation will therefore cover some of the nuances of the javascript code that are vital for the workings of the software.

*****************************

**Brief version history**

Version 1 - Proof of concept of the software, where the bare bone functionalities were tested and didn’t think about end user

Version 2 - core functionality of the software implemented. End user thought about (software is made to be intuitive). User can now make a template and view it in the marking page. Includes some server side things that were not needed as the software headed towards a client based application.

Version 3 - Final Version. Error checks implemented, mark scheme been added and user friendly. FAQ pages added with video tutorials.

*****************************

**jszip-utils.js**

JSZipUtils.getBinaryContent(path, index, callback):
	It is important to note that this is an EDITED version of the original jszip-utils library. We have added the 'index' argument to getBinaryContent to suit the needs of our software, 'index' being the current index of the loop when getBinaryContent is called. As getBinaryContent is asynchronous, one cannot rely on the value of the index being the same when the callback is called, as the loop continues while getBinaryContent runs in the background. This is why we have added the argument here; this argument is passed directly to the callback.

*****************************

**marking.js**

marking.js controls the behaviour of the marking page.

readFile(event):
	This is the function where a template zip is read in. There are a number of asynchronous callbacks defined within each other, creating some callback hell - apologies.
	In words the process is as follows:
		- create a URL linking to the selected zip file
		- get the binary data of the file (getBinaryContent)
		- when the binary data is retrieved, convert it to a useable object from which the files can be obtained (loadAsync)
		- when the object has been constructed, load the template JSON data (async)
		- when the data is loaded, parse it into a useful module object, then retrieve each section's image (async)
		- when each image is retrieved, store its data in the section objects that are contained in the module object
		- when all existing images have been loaded (counter==sections.length), the module object contains all the required data regarding section content, so call createSections to construct the display
		
createSections(sections):
	Clarification of the HTML structure:
		- each section object contains a 'nickname' for the section
		- this nickname is used as the class of the corresponding HTML section, and is used in the ID of some other elements too
		- the HTML section (grey border) contains a heading, mark scheme (image, if present), a large text box, and positive/negative tabs and content (green/red borders)
		- the mark scheme image is contained within a div (ID nickname_markScheme) that is shown and hidden on clicking of the 'Show mark scheme' link
		- the textarea has ID nicknameText
		- the positive/negative tabs are contained as follows:
			- the 'Positive' and 'Negative' buttons that are always visible are two elements of an unordered list - the LIST has class tab-links, not the individual elements. The buttons contain links to the corresponding content (the comment lists). They have ID nickname_positive or nickname_negative.
			- the comment lists are contained in divs of class 'tab positive' (green border) or 'tab negative' (red border). Both of those divs are contained in a larger div of class tab-content, for formatting purposes.
			- an overarching div of class tabContainer contains both the 'Positive' and 'Negative' buttons and their corresponding content. Again, this helps with formatting.
	
printToPDF(text,name,headerText):
	This function uses the jsPDF library, with the jsPDF-AutoTable plugin. The nature of jsPDF does not automatically create line breaks in raw text, or if it does, we could not figure out how. As a result, we have put the content in a table instead, as AutoTable does support both line and page breaks. We remove all the border lines from the table so it does not appear as a table to the user. The table consists of two cells in one column: the column header and one cell of content. The column header in this case contains the module name and the name of the file that has been graded, and this appears in bold in the output PDF. The content cell contains all the compiled comments. We considered separating each section's comments into individual cells, but decided this was not worth the effort as the current output is satisfactory.

*****************************

**formMaker.js**

readTemplate(event):
	See explanation of readFile(event) above - this function is essentially the same, except at the very end a different function is called to fill the editing page.

fillFormMaker(json) and addEmptySection():
	Clarification of the HTML structure:
		- there is a module name input at the top of the form (ID moduleHeader), with a div of class sectionContainer below it (no border). All sections that are added (grey border) appear within sectionContainer, so that showing/hiding sectionContainer shows/hides all the sections.
		- the cross to delete the section (top right of the section) is inside a div with class deleteSection. Opposite it, in the top left of the section, is an empty div of class invisibleDiv. The invisibleDiv has the same dimensions as deleteSection, and is used to balance the effect of deleteSection on the centering of the section heading input.
		- two large divs (green and red borders) contain the comments. Each textarea and delete button pair is contained inside a div of class commentContainer - this is useful because they can then find each other via a jQuery .siblings() search.
		- the additionalPositiveComment or additionalNegativeComment divs seen in the HTML are empty divs that act as a location reference. New commentContainers are added directly above these divs.
		- the image input consists of the input itself and a <label> that displays the selected image's name (the default file name display is hidden using color: transparent in the CSS). This is used to display the names of images used in a template loaded for editing, even though the images are not actually selected in the input. This makes it clearer that when a template is loaded for editing, the previously selected images are retained.

errorCheck():
	Part of this function involves checking if two sections have different images uploaded with the same name. It turned out that just selecting the input file and comparing the file object directly flagged two identical images as different, so this could not be used as a method. We ended up deciding to just compare the name and size of files, assuming that in the vast majority of cases an equal name and size will mean the two files are the same. This is by no means a perfect method, but any other comparisons involved further processing of the image, e.g. by converting into other formats

*****************************
