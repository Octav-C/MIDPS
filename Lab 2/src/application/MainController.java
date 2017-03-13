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
	private double firstNum = 0;
	private double secondNum;
	private String operatorInput;
	private double result;
	private String text;
	private boolean isDel = false;
	private boolean decimal = false;
	private boolean multiply = false;
	private boolean start = false; 
	
	@FXML
	public void processDel (ActionEvent event){
		if (display.getText().equals("")) return;
		isDel = true;
		processNum(event);
	}
	
	@FXML
	public void processNum (ActionEvent event) {
		text = ((Button)event.getSource()).getText();
		start = true;
		if (isDel == true){
			text = display.getText();
			text = text.substring(0, text.length() - 1);
			isDel = false;
			display.setText(text);
		}else{	
		if(display.getText().equals("0") || display.getText().equals("ErDivide by zero") || display.getText().equals("ErrSqrtFromNegative")){
			display.setText(text);
		}
		display.setText(display.getText() + text);
		text = display.getText();
	}}
	
	@FXML
	public void processOperators (ActionEvent event) {
		double value = 0;
		decimal = false;
		
		operatorInput = ((Button)event.getSource()).getText();
		switch (operatorInput){
		case "C":
			display.setText("");
			start = false;
			break;
		case "±":
			if (multiply == false){
			value = BigDecimal.valueOf(Double.parseDouble(display.getText())).doubleValue();
			value = value * (-1);
			display.setText(String.valueOf(value));
			}
			else {
				value = BigDecimal.valueOf(Double.parseDouble(display.getText())).doubleValue();
				value = value * (-1);
				secondNum = value;
				display.setText(String.valueOf(value));
			}
			break;
		case "√":
			firstNum = BigDecimal.valueOf(Double.parseDouble(display.getText())).doubleValue();
			if (firstNum < 0){
				display.setText("ErrSqrtFromNegative");
			}else {
			result = Math.sqrt(firstNum);
			if(String.valueOf(result).endsWith(".0"))
				display.setText(String.valueOf((int)result));
			else
				display.setText(String.valueOf(result));
			}
			break;
		case "%":
			if(multiply == true){
				secondNum = BigDecimal.valueOf(Double.parseDouble(display.getText())).doubleValue();
				result = firstNum * secondNum / 100;
				display.setText(String.valueOf(result));
				multiply = false;
			}else{
			firstNum = BigDecimal.valueOf(Double.parseDouble(display.getText())).doubleValue();
			result = firstNum / 100;
			display.setText(String.valueOf(result));
			}
			break;
		case "÷":
		case "x":
		case "-":
		case "+":
		case "x^":
			multiply = true;
			firstNum = Double.parseDouble(display.getText());
			result = firstNum;
			display.setText("");
			break;
		}
	}
	
	@FXML
	public void processDecimal (ActionEvent event) {
		if(decimal == false){
		display.setText(display.getText() + ((Button)event.getSource()).getText());
		decimal=true;
		}
	}
	
	@FXML
	public void processEqual (ActionEvent event) {
		if(start == false) {
			display.setText("0");
			return;
		}
		if (multiply == true){
		secondNum = Double.parseDouble(display.getText());
		multiply = false;
		}
		switch (operatorInput){
		case "÷":
			if(secondNum == 0){
				display.setText("ErDivide by zero");
				return;
			}
			else{
			result = BigDecimal.valueOf(result / secondNum).setScale(9, RoundingMode.HALF_UP).doubleValue();
			}
			break;
		case "x":
			result = BigDecimal.valueOf(result * secondNum).setScale(9, RoundingMode.HALF_UP).doubleValue();
			break;
		case "-":
			result = BigDecimal.valueOf(result - secondNum).setScale(9, RoundingMode.HALF_UP).doubleValue();
			break;
		case "+":
			result = BigDecimal.valueOf(result + secondNum).setScale(9, RoundingMode.HALF_UP).doubleValue();;
			break;
		case "x^":
			result = BigDecimal.valueOf(Math.pow(result, secondNum)).setScale(9, RoundingMode.HALF_UP).doubleValue();
			break;
		default:
			display.setText("Invalid symbol");
			break;	
		}
		if (String.valueOf(result).endsWith(".0"))
			display.setText(String.valueOf((int)result));
		else
		display.setText(String.valueOf(result));
		
	}
}
