function convertWeight() {
    const inputWeight = document.getElementById('inputWeight').value;
    const selectFrom = document.getElementById('selectFrom').value;
    const selectTo = document.getElementById('selectTo').value;

    let result;

    // Conversion logic
    if (selectFrom === 'gram' && selectTo === 'ounce') {
      result = inputWeight * 0.03527396;
    } else if (selectFrom === 'gram' && selectTo === 'carat') {
      result = inputWeight * 5;
    } else if (selectFrom === 'ounce' && selectTo === 'gram') {
      result = inputWeight / 0.03527396;
    } else if (selectFrom === 'ounce' && selectTo === 'carat') {
      result = (inputWeight / 0.03527396) * 5;
    } else if (selectFrom === 'carat' && selectTo === 'gram') {
      result = inputWeight / 5;
    } else if (selectFrom === 'carat' && selectTo === 'ounce') {
      result = (inputWeight / 5) * 0.03527396;
    } else {
      result = inputWeight; // If the units are the same, no conversion needed
    }

    document.getElementById('result').innerHTML = `${inputWeight} ${selectFrom} is equal to ${result.toFixed(2)} ${selectTo}`;
  }