//
//  GameViewController.swift
//  Tetris Game
//
//  Created by Octavian Coroletchi on 4/29/17.
//  Copyright © 2017 JokDev's Co. All rights reserved.
//

import UIKit
import SpriteKit
import GameplayKit

class GameViewController: UIViewController {
    @IBOutlet weak var welcome: UILabel!
    
    @IBAction func welcome_appear(_ sender: Any) {
        if self.welcome.isHidden == true {
            self.welcome.isHidden = false
        } else
            if self.welcome.isHidden == false {
                self.welcome.isHidden = true
        }
    }
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        self.welcome.isHidden = false

    
    }


    override var prefersStatusBarHidden: Bool {
        return true
    }
}
