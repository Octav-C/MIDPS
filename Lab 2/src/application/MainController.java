package application;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;

public class MainController {
	
	@FXML
	private Label display;
	private String output = "";
	private double firstNum;
	private double secondNum;
	private String operatorInput;
	private double result;
	private String text;
	private boolean isDel = false;
	
	
	@FXML
	public void processDel (ActionEvent event){
		isDel = true;
		processNum(event);
		
	}
	
	@FXML
	public void processNum (ActionEvent event) {
		text = ((Button)event.getSource()).getText();
		if (isDel == true){
			text = display.getText();
			text = text.substring(0, text.length() - 1);
			isDel = false;
			display.setText(text);
		}else {	
		if (display.getText() == "0")
			display.setText("");

		display.setText(display.getText() + text);
	}}
	
	@FXML
	public void processOperators (ActionEvent event) {
		double value;
		operatorInput = ((Button)event.getSource()).getText();
		switch (operatorInput){
		case "C":
			display.setText("0");
			break;
		case "±":
			value = Double.parseDouble(display.getText());
			value = value * (-1);
			display.setText(String.valueOf(value));
			break;
		case "√":
			firstNum = Double.parseDouble(display.getText());
			result = Math.sqrt(firstNum);
			display.setText(String.valueOf(result));
			break;
		case "%":
		case "÷":
		case "x":
		case "-":
		case "+":
		
		case "x^":
			firstNum = Double.parseDouble(display.getText());
			display.setText("");
			
		}
	}
	
	@FXML
	public void processDecimal (ActionEvent event) {
	
	}
	
	@FXML
	public void processEqual (ActionEvent event) {
		secondNum = Double.parseDouble(display.getText());
		switch (operatorInput){
		case "%":
			if (display.getText().equals(""))
				result = 0;
			else
			result = firstNum * secondNum / 100;
			break;
		case "÷":
			result = firstNum / secondNum;
			break;
		case "x":
			result = firstNum * secondNum;
			break;
		case "-":
			result = firstNum - secondNum;
			break;
		case "+":
			result = firstNum + secondNum;
			break;
		case "x^":
			result = Math.pow(firstNum, secondNum);
			break;
		default:
			display.setText("Invalid symbol");
			break;	
		}
		display.setText(String.valueOf(result));
	}
	
	

}
