window.addEventListener("load", async () => {
    // (A) GET HTML ELEMENTS
    const hSel = document.getElementById("Photodoc"),
          hNumSerie = document.getElementById("NumSerie"),
          hType = document.getElementById("Type");
  
    // (B) CREATE ENGLISH TESSERACT WORKER
    const worker = await Tesseract.createWorker();
    await worker.loadLanguage("eng");
    await worker.initialize("eng");
  
    // (C) ON FILE SELECT - IMAGE TO TEXT
    hSel.onchange = async () => {
        const useOCR = window.confirm("Do you want to use OCR to fill the form?");
        if (useOCR) {
          const res = await worker.recognize(hSel.files[0]);
          const recognizedText = res.data.text;
          const documentName = extractDocumentName(recognizedText);
          const documentID = extractDocumentID(recognizedText);
    
          // Display the recognized text, document name, and expiration date
          hNumSerie.value = documentID;
          hType.value = documentName;
        }
      };
  
    // (D) FUNCTION TO EXTRACT DOCUMENT NAME
    function extractDocumentName(text) {
      // Common keywords and patterns indicating document names
      const documentNameKeywords = [
        "passport",
        "driver's license",
        "ID card",
        "identification",
        "certificate",
        "SSN", // Social Security Number
        "tax ID",
        "voter ID",
        "national ID",
        "residence permit",
        "citizenship card",
        "birth certificate",
        "marriage certificate",
        "divorce certificate",
        "diploma",
        "degree certificate",
        "business license",
        "work permit",
        "health insurance card",
        "library card",
        "membership card",
        "loyalty card"
      ];
  
      // Regular expressions to match document name patterns
      const documentNameRegexes = [
        /(passport|driver\s*license|id\s*card)/i,
        /(identification\s*number|ssn|tax\s*id|voter\s*id)/i,
        /(national\s*id|residence\s*permit|citizenship\s*card)/i,
        /(birth\s*certificate|marriage\s*certificate|divorce\s*certificate)/i,
        /(diploma|degree\s*certificate)/i,
        /(business\s*license|work\s*permit)/i,
        /(health\s*insurance\s*card|library\s*card|membership\s*card|loyalty\s*card)/i
      ];
  
      // Search for keywords and patterns in the text
      for (const keyword of documentNameKeywords) {
        if (text.toLowerCase().includes(keyword.toLowerCase())) {
          return keyword; // Return the keyword if found
        }
      }
  
      // Match document name patterns in the text
      for (const regex of documentNameRegexes) {
        const match = text.match(regex);
        if (match) {
          return match[0]; // Return the matched pattern
        }
      }
  
      return "Document Name Not Found";
    }
  
    function extractDocumentID(text) {
      // Regular expression to match numeric sequences of at least 6 digits
      const documentIDRegex = /\b\d{6,}\b/g; // Match sequences of at least 6 digits
  
      // Match all occurrences of numeric sequences in the text
      const matches = text.match(documentIDRegex);
  
      // If there are multiple matches, check if any match appears as a standalone ID
      if (matches && matches.length > 1) {
          for (const match of matches) {
              const index = text.indexOf(match);
              if (index === 0 || /\s/.test(text[index - 1])) {
                  return match; // Return the first standalone ID found
              }
          }
      }
  
      // If there is only one match or no standalone ID is found, return the first match
      return matches ? matches[0] : "Document ID Not Found";
  }
  
  
  
  });
  