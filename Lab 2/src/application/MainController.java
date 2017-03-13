package application;

import java.math.BigDecimal;
import java.math.RoundingMode;

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
	private boolean decimal = false;
	
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
		text = display.getText();
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
			value = BigDecimal.valueOf(Double.parseDouble(display.getText())).doubleValue();
			value = value * (-1);
			display.setText(String.valueOf(value));
			break;
		case "√":
			firstNum = BigDecimal.valueOf(Double.parseDouble(display.getText())).doubleValue();
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
		display.setText(text + ((Button)event.getSource()).getText());
		
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
			result = BigDecimal.valueOf(Math.pow(firstNum, secondNum)).setScale(9, RoundingMode.HALF_UP).doubleValue();
			break;
		default:
			display.setText("Invalid symbol");
			break;	
		}
		display.setText(String.valueOf(result));
	}
}
