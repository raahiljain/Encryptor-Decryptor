# Encryptor-Decryptor
swagger: '2.0'
info:
  description: defaultDescription
  version: '0.1'
  title: defaultTitle
paths:
  '/apiwork/api/{param0}/{param1}':
    get:
      parameters:
        - name: param0
          in: path
          description: 'Example values form path are: ''Decrypt'' and ''Encrypt'''
          required: true
          type: string
        - name: param1
          in: path
          description: 'Example values form path are: ''buih'' and ''asfd'''
          required: true
          type: string
      responses:
        default:
          description: Definition generated from Swagger Inspector