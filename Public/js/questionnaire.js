data = '['+
'  {'+
'    "QAName" : "视力是否下降？",'+
'    "options" : ["是", "否"],'+
'    "childQA" : ['+
'      ['+
'        {'+
'          "QAName" : "单眼下降还是双眼下降？",'+
'          "options" : ["单眼", "双眼"],'+
'          "childQA" : ['+
'            "",'+
'            ['+
'              {'+
'                "QAName" : "双眼同时下降还是先后下降",'+
'                "options" : ["同时", "先后"],'+
'                "childQA" : ["", ""]'+
'              }'+
'            ]'+
'          ]'+
'        },'+
'        {'+
'          "QAName" : "视力下降的程度如何？",'+
'          "options" : ["轻度模糊", "明显模糊", "眼前发黑、发暗", "伸手不见五指"],'+
'          "childQA" : ["", "", "", ""]'+
'        },'+
'        {'+
'          "QAName" : "属于哪种特性的视力下降？",'+
'          "options" : ["突发性", "一过性", "渐进性", "波动性/间断性"],'+
'          "childQA" : ["", "",'+
'            ['+
'              {'+
'                "QAName" : "属于哪种渐进性的视力下降？",'+
'                "options" : ["视远视力下降", "视近视力下降"],'+
'                "childQA" : ["", ""]'+
'              }'+
'            ],'+
'            ""]'+
'        }'+
'      ],'+
'      ""'+
'    ]'+
'  },'+
'  {'+
'    "QAName" : "视野是否缺损？",'+
'    "options" : ["是", "否"],'+
'    "childQA" : ['+
'      ['+
'        {'+
'          "QAName" : "单眼缺损还是双眼缺损？",'+
'          "options" : ["单眼", "双眼"],'+
'          "childQA" : ['+
'            "",'+
'            ['+
'              {'+
'                "QAName" : "双眼同时缺损还是先后缺损？",'+
'                "options" : ["同时", "先后"],'+
'                "childQA" : ['+
'                  ['+
'                    {'+
'                      "QAName" : "双眼缺损是否对称?",'+
'                      "options" : ["是", "否"],'+
'                      "childQA" : ["", ""]'+
'                    }'+
'                  ]'+
'                  ,'+
'                  ['+
'                    {'+
'                      "QAName" : "双眼缺损是否对称?",'+
'                      "options" : ["是", "否"],'+
'                      "childQA" : ["", ""]'+
'                    }'+
'                  ]'+
'                ]'+
'              }'+
'            ]'+
'          ]'+
'        }'+
'      ],'+
'      ""'+
'    ]'+
'  }'+
']'+
'';
